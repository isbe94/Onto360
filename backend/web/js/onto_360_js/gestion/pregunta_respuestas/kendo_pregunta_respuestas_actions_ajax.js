/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/



function setsubmitbtn(e){
	$('#btnsubmit').val(e.id);
	return true;
}

$("#text-search-pregunta_respuestas").keyup(function (event) {
	var q = $("#text-search-pregunta_respuestas").val();
	var grid = $("#gridselection_pregunta_respuestas").data("kendoGrid");
	grid.dataSource.query({

		page: 1,
		pageSize: 20,
		filter: {
			logic: "or",
			filters: [

				{field: "respuesta", operator: "contains", value: q},

				{field: "pregunta", operator: "contains", value: q}

			]
		}
	});
});
$("#clear-filter-pregunta_respuestas").click(function (event) {
	event.preventDefault();
	var datasource = $("#gridselection_pregunta_respuestas").data("kendoGrid").dataSource;
	//Clear filters:
	datasource.filter([]);
	$("#text-search-pregunta_respuestas").val('')
});


$("#btn_modal_pregunta_respuestas").click(function() {
	Pregunta_respuestas.oldElement=null;
	$('#select2-id_pregunta-container').html('');
	Pregunta_respuestas.combobox_pregunta.append('<option selected="" value=""></option>').change();
	$('#select2-id_respuesta-container').html('');
	$('.select2-selection__rendered').html('');
	// Pregunta_respuestas.combobox_respuesta.select2('destroy')
	// ComponentsPregunta_respuestas.initid_respuesta();
	Pregunta_respuestas.combobox_respuesta.append('<option selected="" value=""></option>').change();
	$('#idpregunta_respuestas').val('-1');
	Pregunta_respuestas.combobox_respuesta.val(null).trigger('change');
	Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').resetForm(true);
	$('#pregunta_respuestas_form')[0].reset();
	$('#resp_correcta').iCheck('uncheck');
	$('#btnaction_pregunta_respuestas').html('Guardar');
	$("#title_pregunta_respuestas").html('Insertar Pregunta_respuestas');
	$("#taskpregunta_respuestas").val('insert');
	$('#btnaction_pregunta_respuestas_new').show();
	$('#select2-id_pregunta_combo-container').html('');
	$('#select2-id_respuesta_combo-container').html('');
	$("#modal_pregunta_respuestas").modal();
});

$("#reload_pregunta_respuestas").click(function() {
	if($('#taskpregunta_respuestas').val()!='update') {
		resetpregunta_respuestasForm();
	}
	else {
		Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').resetForm(true);
		Pregunta_respuestas.combobox_respuesta.append('<option selected="" value="'+Pregunta_respuestas.oldElement.id_respuesta+'">'+Pregunta_respuestas.oldElement.respuesta+'</option>').change();
		Pregunta_respuestas.combobox_respuesta.val(Pregunta_respuestas.oldElement.id_respuesta);
		Pregunta_respuestas.combobox_pregunta.append('<option selected="" value="'+Pregunta_respuestas.oldElement.id_pregunta+'">'+Pregunta_respuestas.oldElement.pregunta+'</option>').change();
		Pregunta_respuestas.combobox_pregunta.val(Pregunta_respuestas.oldElement.id_pregunta);
		$("#pregunta_respuestas").val($.trim(Pregunta_respuestas.oldElement.pregunta_respuestas));
		$('#idpregunta_respuestas').val(pregunta_respuestas.oldElement.idpregunta_respuestas);
		$("#taskpregunta_respuestas").val('update');
		Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').validate();
	}
});


function showUpdate_pregunta_respuestas(e) {

	Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').resetForm(true);
	var dataItem=Pregunta_respuestas.finditem(e.id);
	Pregunta_respuestas.oldElement= dataItem;
	$('#resp_correcta').iCheck('uncheck');
	if(Pregunta_respuestas.oldElement.resp_correcta==1)
	{
		$('#resp_correcta').iCheck('check');
	}
	var arreglo=dataItem.resp_array.split(',');
	$(".select2-selection__rendered").html('');
	arreglo.forEach(function(element,index){
		var resp=Respuesta.findbyidrespuesta(element);
		Pregunta_respuestas.combobox_respuesta.append('<option selected="" value="'+resp.id_respuesta+'">'+resp.respuesta+'</option>').change();
	})
	Pregunta_respuestas.combobox_respuesta.val(dataItem.resp_array);
	Pregunta_respuestas.combobox_pregunta.append('<option selected="" value="'+Pregunta_respuestas.oldElement.idpregunta+'">'+Pregunta_respuestas.oldElement.pregunta+'</option>').change();
	Pregunta_respuestas.combobox_pregunta.val(Pregunta_respuestas.oldElement.idpregunta);
	$("#taskpregunta_respuestas").val('update');
	$('#btnaction_pregunta_respuestas_new').hide();
	$('#btnaction_pregunta_respuestas').html('Actualizar');
	$("#title_pregunta_respuestas").html('Actualizar Pregunta_respuestas');
	$("#modal_pregunta_respuestas").modal();
}


//Boton Accion
$('.btnaction').click(function () {
	var btnid=this.id;
	Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').validate();
	if(Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').isValid())
	{
		/*CREANDO LOADING BUTTONS*/

		var pregunta_respuestas={};
		pregunta_respuestas.id_pregunta=Pregunta_respuestas.combobox_pregunta.val();
		pregunta_respuestas.id_respuesta=Pregunta_respuestas.combobox_respuesta.val();
		var url=urlhome+"gestion/pregunta_respuestas/create";
		var title="Insertando elemento...";
		if($('#taskpregunta_respuestas').val()=="update")
		{
			var url=urlhome+"gestion/pregunta_respuestas/update";
			title="Actualizando elemento...";
			$('#btnaction_pregunta_respuestas_new').hide();
			pregunta_respuestas.idpregunta_respuestas=Pregunta_respuestas.oldElement.idpregunta_respuestas;

		}
		if(btnid.indexOf('new')!=-1 && $('#taskpregunta_respuestas').val() != 'update')
			$.ajax({
				type: "POST",
				url:url,
				data:{
					Pregunta_respuestas:pregunta_respuestas,
					_onto_CSRF:_csrf
				},
				success:function(response){
					if(response.success)
					{
						var message='El elemento fue insertado con exito'
						var accion='insertado';
						Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','La pregunta con su respuesta fue '+accion+' correctamente', message,'topRight');
					}
					else
					{
						var message='Error en inserción'
						Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
					}
					Pregunta_respuestas.gridDataSource.read();
					$.noty.closeAll();

					resetpregunta_respuestasForm();            },
				error:function(response){
					if(response)
					{
						Noty('#D91E18','error',2000,'fa fa-ban','Error en accion',response.message,'topRight');
					}
					$.noty.closeAll();

				}
			});
		else
			$.ajax({
				type: "POST",
				url:url,
				data:{
					Pregunta_respuestas:pregunta_respuestas,
					_onto_CSRF:_csrf
				},
				success:function(response){
					if(response.success)
					{
						var message='El elemento fue insertado con éxito'
						var accion='insertado';
						if($('#taskpregunta_respuestas').val()=='update') {
							message = 'El elemento fue actualizado con éxito'
							accion='actualizado';

						}
						Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','La pregunta con su respuesta fue '+accion+' correctamente', message,'topRight');
					}
					else
					{
						var message='Esta pregunta ya posee esta respuesta'
						if($('#taskpregunta_respuestas').val()=='update')
							message='Error en actualizacion'
						Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
					}
					Pregunta_respuestas.gridDataSource.read();
					$.noty.closeAll();

					$("#modal_pregunta_respuestas").modal('hide');
				},
				error:function(response){
					if(response)
					{
						Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
					}
					$.noty.closeAll();

					$("#modal_pregunta_respuestas").modal('hide');
				}
			});

	}
});


//Eliminar elemento
function delete_element_pregunta_respuestasbypreg(e) {
	var dataItem={};
	dataItem.idpregunta=e.id;
	var array=[];
	array.push(dataItem);
	$.MetroMessageBox({
			title: "<span class='fa fa-trash-o'></span> Eliminar ",
			content: "<p class='fg-white'>Desea eliminar este elemento?</p> ",
			NormalButton: "#232323",
			ActiveButton: "#008a00 ",
			buttons: " [Cancelar][Aceptar]"
		}, function (a) {
			if(a=="Aceptar")
			{
				Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				$.ajax({
					type: "POST",
					url:urlhome+"/gestion/pregunta_respuestas/deletebypreg",
					data:{
						array:JSON.stringify(array),
						_onto_CSRF:_csrf
					},
					success:function(response){
						if(response.success==true) {
							Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','Elemento eliminado correctamente', 'El elemento fue eliminado correctamente','topRight');
						}
						else
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion',response.message,'topRight');
						}
						pregunta_respuestas.gridDataSource.read();
						$.noty.closeAll();
					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Pregunta_respuestas.gridDataSource.read();
						$.noty.closeAll();
					}
				});
				$.noty.closeAll();
			}
			else
				$.noty.closeAll();
		}
	)
}

function delete_element_pregunta_respuestas(e) {
	var dataItem={};
	dataItem.idpregunta_respuestas=e.id;
	var array=[];
	array.push(dataItem);
	$.MetroMessageBox({
			title: "<span class='fa fa-trash-o'></span> Eliminar ",
			content: "<p class='fg-white'>Desea eliminar este elemento?</p> ",
			NormalButton: "#232323",
			ActiveButton: "#008a00 ",
			buttons: " [Cancelar][Aceptar]"
		}, function (a) {
			if(a=="Aceptar")
			{
				$.ajax({
					type: "POST",
					url:urlhome+"/gestion/pregunta_respuestas/delete",
					data:{
						array:JSON.stringify(array),
						_onto_CSRF:_csrf
					},
					success:function(response){
						if(response.success==true) {
							Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','Elemento eliminado correctamente', 'El elemento fue eliminado correctamente','topRight');
						}
						else
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion',response.message,'topRight');
						}
						Pregunta_respuestas.gridDataSource.read();
						$.noty.closeAll();

					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Pregunta_respuestas.gridDataSource.read();
						$.noty.closeAll();

					}
				});
				$.noty.closeAll();
			}
			else{
				$.noty.closeAll();

			}
		}
	)
}


//Eliminar elemento
$('#deletebutton_pregunta_respuestas').click(function()
{
	var checkbox_checked=$('#gridselection_pregunta_respuestas .check_row:checked');
	if(checkbox_checked.length==0)
	{

		Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
		return false;
	}
	var array=[];
	checkbox_checked.each(function(){
			var dataItem=Pregunta_respuestas.finditem($(this).attr('id'));
			array.push(dataItem);
		}
	);
	$.MetroMessageBox({
			title: "<span class='fa fa-trash-o'></span> Eliminar ",
			content: "<p class='fg-white'>Desea eliminar los elementos seleccionados?</p> ",
			NormalButton: "#232323",
			ActiveButton: "#008a00 ",
			buttons: " [Cancelar][Aceptar]"
		}, function (a) {
			if(a=="Aceptar")
			{
				Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elementos', 'center');
				$.ajax({
					type: "POST",
					url:urlhome+"/gestion/pregunta_respuestas/deletebypreg",
					data:{
						array:JSON.stringify(array),
						_onto_CSRF:_csrf
					},
					success:function(response){
						if(response.success==true) {
							Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','Elemento eliminado', 'Elemento eliminado correctamente','topRight');			                    }
						else
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion',response.message,'topRight');
						}
						Pregunta_respuestas.gridDataSource.read();
						$.noty.closeAll();
					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Pregunta_respuestas.gridDataSource.read();
						$.noty.closeAll();
					}
				});
				$.noty.closeAll();
			}
			else
				$.noty.closeAll();
		}
	)
});


$("#excel_pregunta_respuestas").click(function() {
	var list='';
	var filters =  Pregunta_respuestas.gridDataSource.filter();
	if(filters) {
		var allData = Pregunta_respuestas.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Pregunta_respuestas.gridDataSource.data();
	$('#pregunta_respuestas_export').val(JSON.stringify(list));
	$('#form_excel_export').submit();
});

$("#pdf_pregunta_respuestas").click(function() {
	$('#list_pregunta_respuestas_pdf').modal();
	$("#tbody_table_pregunta_respuestas").html('');
	var list='';
	var filters =  Pregunta_respuestas.gridDataSource.filter();
	if(filters) {
		var allData = Pregunta_respuestas.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Pregunta_respuestas.gridDataSource.data();
	list.forEach(Pregunta_respuestas.list_pdf);
});

$("#export_pregunta_respuestas_pdf").click(function() {
	$('body').modalmanager('loading');
	$("#tbody_table_pregunta_respuestas").html('');
	var list='';
	var filters =  Pregunta_respuestas.gridDataSource.filter();
	if(filters) {
		var allData = Pregunta_respuestas.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Pregunta_respuestas.gridDataSource.data();
	list.forEach(Pregunta_respuestas.list_pdf);
	kendo.drawing.drawDOM($("#table_pregunta_respuestas_pdf"))
		.then(function(group) {
			// Render the result as a PDF file
			return kendo.drawing.exportPDF(group, {
				paperSize: "auto",
				margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" }
			});
		})
		.done(function(data) {
			// Save the PDF file
			$('body').modalmanager('removeLoading');
			$('#list_pregunta_respuestas_pdf').modal('hide');
			kendo.saveAs({
				dataURI: data,
				fileName: "Pregunta_respuestas_Report_PDF.pdf",
				//proxyURL: "//demos.telerik.com/kendo-ui/service/export"
			});
		});
});

$("#excel_pregunta_respuestas_importar").click(function() {
	$('#import_pregunta_respuestas').modal();
});


$("#importar_pregunta_respuestas_excel").click(function() {
	if(Pregunta_respuestas.importarbootstrapValidator.isValid())
	{
		var data= new FormData();
		var excel= $('#importar_excel')[0].files[0];
		data.append('excel',excel);
		data.append('_onto_CSRF',_csrf);
		var url=urlhome+"gestion/pregunta_respuestas/load_excel";
		$.ajax({
			type: "POST",
			url:url,
			contentType:false, //Debe estar en false para que pase el objeto sin procesar
			data:data, //Le pasamos el objeto que creamos con los archivos
			processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
			cache:false, //Para que el formulario no guarde cache
			success:function(response){
				var result=jQuery.parseJSON(response);
				if(!result.success)
				{
					$('#text-error').html(result.message);
					$.smallBox({
						title: '',
						content:$('#message-error').html(),
						color: "#BA0916",
						timeout: 6000
					})
				}
				else
				{
					Pregunta_respuestas.gridDataSource.read();
					$('#import_pregunta_respuestas').modal('hide');
					Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
				}

			}
		});
	}
});

//Para chequear todos los elementos
$('#all_check_pregunta_respuestas').click(function () {
	var c = this.checked;
	$('#gridselection_pregunta_respuestas :checkbox').prop('checked',c);
});

function resetpregunta_respuestasForm() {
	$('#select2-id_respuesta-container').html('');
	Pregunta_respuestas.combobox_respuesta.append('<option selected="" value=""></option>').change();
	$('#select2-id_pregunta-container').html('');
	Pregunta_respuestas.combobox_pregunta.append('<option selected="" value=""></option>').change();
	Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').resetForm(true);
}

