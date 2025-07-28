/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/



function setsubmitbtn(e){
	$('#btnsubmit').val(e.id);
	return true;
}

$("#text-search-clasificacion_ontologia").keyup(function (event) {
	var q = $("#text-search-clasificacion_ontologia").val();
	var grid = $("#gridselection_clasificacion_ontologia").data("kendoGrid");
	grid.dataSource.query({
		page: 1,
		pageSize: 20,
		filter: {
			logic: "or",
			filters: [

				{field: "nombre", operator: "contains", value: q},

				{field: "clasificacion", operator: "contains", value: q}

			]
		}
	});
});
$("#clear-filter-clasificacion_ontologia").click(function (event) {
	event.preventDefault();
	var datasource = $("#gridselection_clasificacion_ontologia").data("kendoGrid").dataSource;
	//Clear filters:
	datasource.filter([]);
	$("#text-search-clasificacion_ontologia").val('')
});


$("#btn_modal_clasificacion_ontologia").click(function() {
	Clasificacion_ontologia.oldElement=null;
	$('#select2-id_ontologia-container').html('');
	Clasificacion_ontologia.combobox_ontologia.append('<option selected="" value=""></option>').change();
	$('#select2-id_clasificacion-container').html('');
	$('.select2-selection__rendered').html('');
	// Clasificacion_ontologia.combobox_clasificaciones.select2('destroy')
	// ComponentsClasificacion_ontologia.initId_clasificacion();
	Clasificacion_ontologia.combobox_clasificaciones.append('<option selected="" value=""></option>').change();
	$('#idclasifonto').val('-1');
	Clasificacion_ontologia.combobox_clasificaciones.val(null).trigger('change');
	Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').resetForm(true);
	$('#clasificacion_ontologia_form')[0].reset();
	$('#selecclasif').iCheck('uncheck');
	$('#btnaction_clasificacion_ontologia').html('Guardar');
	$("#title_clasificacion_ontologia").html('Insertar Clasificacion_ontologia');
	$("#taskclasificacion_ontologia").val('insert');
	$('#btnaction_clasificacion_ontologia_new').show();
	$('#select2-id_ontologia_combo-container').html('');
	$('#select2-id_clasificacion_combo-container').html('');
	$("#modal_clasificacion_ontologia").modal();
});

$("#reload_clasificacion_ontologia").click(function() {
	if($('#taskclasificacion_ontologia').val()!='update') {
		resetclasificacion_ontologiaForm();
	}
	else {
		Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').resetForm(true);
		Clasificacion_ontologia.combobox_ontologia.append('<option selected="" value="'+Clasificacion_ontologia.oldElement.id_ontologia+'">'+Clasificacion_ontologia.oldElement.nombre+'</option>').change();
		Clasificacion_ontologia.combobox_ontologia.val(Clasificacion_ontologia.oldElement.id_ontologia);
		Clasificacion_ontologia.combobox_clasificaciones.append('<option selected="" value="'+Clasificacion_ontologia.oldElement.id_clasificacion+'">'+Clasificacion_ontologia.oldElement.clasificacion+'</option>').change();
		Clasificacion_ontologia.combobox_clasificaciones.val(Clasificacion_ontologia.oldElement.id_clasificacion);
		$('#idclasifonto').val(clasificacion_ontologia.oldElement.idclasifonto);
		$("#taskclasificacion_ontologia").val('update');
		Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').validate();
	}
});

function showUpdate_clasificacion_ontologia(e) {

	Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').resetForm(true);
	var dataItem=Clasificacion_ontologia.finditem(e.id);
	Clasificacion_ontologia.oldElement= dataItem;
	var arreglo=dataItem.clasif_array.split(',');
	$(".select2-selection__rendered").html('');
	arreglo.forEach(function(element,index){
		var clasif=Clasificacion.findbyidclasificacion(element);
		Clasificacion_ontologia.combobox_clasificaciones.append('<option selected="" value="'+clasif.id_clasificacion+'">'+clasif.clasificacion+'</option>').change();
	})
	Clasificacion_ontologia.combobox_clasificaciones.val(dataItem.clasif_array);
	Clasificacion_ontologia.combobox_ontologia.append('<option selected="" value="'+Clasificacion_ontologia.oldElement.idontologia+'">'+Clasificacion_ontologia.oldElement.nombre+'</option>').change();
	Clasificacion_ontologia.combobox_ontologia.val(Clasificacion_ontologia.oldElement.idontologia);
	$("#taskclasificacion_ontologia").val('update');
	$('#btnaction_clasificacion_ontologia_new').hide();
	$('#btnaction_clasificacion_ontologia').html('Actualizar');
	$("#title_clasificacion_ontologia").html('Actualizar Clasificacion_ontologia');
	$("#modal_clasificacion_ontologia").modal();
}


//Boton Accion
$('.btnaction').click(function () {
	var btnid=this.id;
	Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').validate();
	if(Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').isValid())
	{
		/*CREANDO LOADING BUTTONS*/

		var clasificacion_ontologia={};
		clasificacion_ontologia.id_ontologia=Clasificacion_ontologia.combobox_ontologia.val();
		clasificacion_ontologia.id_clasificacion=Clasificacion_ontologia.combobox_clasificaciones.val();
		var url=urlhome+"gestion/clasificacion_ontologia/create";
		var title="Insertando elemento...";
		if($('#taskclasificacion_ontologia').val()=="update")
		{
			var url=urlhome+"gestion/clasificacion_ontologia/update";
			title="Actualizando elemento...";
			$('#btnaction_clasificacion_ontologia_new').hide();
			clasificacion_ontologia.idclasifonto=Clasificacion_ontologia.oldElement.idclasifonto;

		}
		if(btnid.indexOf('new')!=-1 && $('#taskclasificacion_ontologia').val() != 'update')
			$.ajax({
				type: "POST",
				url:url,
				data:{
					Clasificacion_ontologia:clasificacion_ontologia,
					_onto_CSRF:_csrf
				},
				success:function(response){
					if(response.success)
					{
						var message='El elemento fue insertado con exito'
						var accion='insertado';
						Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El clasificacion_ontologia fue '+accion+' correctamente', message,'topRight');
					}
					else
					{
						var message='Error en inserción'
						Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
					}
					Clasificacion_ontologia.gridDataSource.read();
					$.noty.closeAll();

					resetclasificacion_ontologiaForm();            },
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
					Clasificacion_ontologia:clasificacion_ontologia,
					_onto_CSRF:_csrf
				},
				success:function(response){
					if(response.success)
					{
						var message='El elemento fue insertado con éxito'
						var accion='insertado';
						if($('#taskclasificacion_ontologia').val()=='update') {
							message = 'El elemento fue actualizado con éxito'
							accion='actualizado';

						}
						Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El clasificacion_ontologia fue '+accion+' correctamente', message,'topRight');
					}
					else
					{
						var message='Esta ontología ya posee esta clasificación'
						if($('#taskclasificacion_ontologia').val()=='update')
							message='Error en actualizacion'
						Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
					}
					Clasificacion_ontologia.gridDataSource.read();
					$.noty.closeAll();

					$("#modal_clasificacion_ontologia").modal('hide');
				},
				error:function(response){
					if(response)
					{
						Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
					}
					$.noty.closeAll();

					$("#modal_clasificacion_ontologia").modal('hide');
				}
			});

	}
});


function delete_element_clasificacion_ontologia(e) {
	var dataItem={};
	dataItem.idclasifonto=e.id;
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
					url:urlhome+"/gestion/clasificacion_ontologia/delete",
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
						Clasificacion_ontologia.gridDataSource.read();
						$.noty.closeAll();

					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Clasificacion_ontologia.gridDataSource.read();
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


function delete_element_clasificacion_ontologiabyonto(e)
{
	var dataItem={};
	dataItem.idontologia=e.id;
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
					url:urlhome+"/gestion/clasificacion_ontologia/deletebyonto",
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
						Clasificacion_ontologia.gridDataSource.read();
						$.noty.closeAll();

					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Clasificacion_ontologia.gridDataSource.read();
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
$('#deletebutton_clasificacion_ontologia').click(function()
{
	var checkbox_checked=$('#gridselection_clasificacion_ontologia .check_row:checked');

	if(checkbox_checked.length==0)
	{

		Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
		return false;
	}
	var array=[];
	checkbox_checked.each(function(){
			var dataItem=Clasificacion_ontologia.finditem($(this).attr('id'));
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

				$.ajax({
					type: "POST",
					url:urlhome+"/gestion/clasificacion_ontologia/deletebyonto",
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
						Clasificacion_ontologia.gridDataSource.read();
						$.noty.closeAll();

					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Clasificacion_ontologia.gridDataSource.read();
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
});
$("#excel_clasificacion_ontologia").click(function() {
	var list='';
	var filters =  Clasificacion_ontologia.gridDataSource.filter();
	if(filters) {
		var allData = Clasificacion_ontologia.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Clasificacion_ontologia.gridDataSource.data();
	$('#clasificacion_ontologia_export').val(JSON.stringify(list));
	$('#form_excel_export').submit();
});

$("#pdf_clasificacion_ontologia").click(function() {
	$('#list_clasificacion_ontologia_pdf').modal();
	$("#tbody_table_clasificacion_ontologia").html('');
	var list='';
	var filters =  Clasificacion_ontologia.gridDataSource.filter();
	if(filters) {
		var allData = Clasificacion_ontologia.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Clasificacion_ontologia.gridDataSource.data();
	list.forEach(Clasificacion_ontologia.list_pdf);
});

$("#export_clasificacion_ontologia_pdf").click(function() {
	$('body').modalmanager('loading');
	$("#tbody_table_clasificacion_ontologia").html('');
	var list='';
	var filters =  Clasificacion_ontologia.gridDataSource.filter();
	if(filters) {
		var allData = Clasificacion_ontologia.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Clasificacion_ontologia.gridDataSource.data();
	list.forEach(Clasificacion_ontologia.list_pdf);
	kendo.drawing.drawDOM($("#table_clasificacion_ontologia_pdf"))
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
			$('#list_clasificacion_ontologia_pdf').modal('hide');
			kendo.saveAs({
				dataURI: data,
				fileName: "Clasificacion_ontologia_Report_PDF.pdf"
			});
		});
});

$("#excel_clasificacion_ontologia_importar").click(function() {
	$('#import_clasificacion_ontologia').modal();
});


$("#importar_clasificacion_ontologia_excel").click(function() {
	if(Clasificacion_ontologia.importarbootstrapValidator.isValid())
	{
		var data= new FormData();
		var excel= $('#importar_excel')[0].files[0];
		data.append('excel',excel);
		data.append('_onto_CSRF',_csrf);
		var url=urlhome+"gestion/clasificacion_ontologia/load_excel";
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
					Clasificacion_ontologia.gridDataSource.read();
					$('#import_clasificacion_ontologia').modal('hide');
					Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
				}

			}
		});
	}
});

//Para chequear todos los elementos
$('#all_check_clasificacion_ontologia').click(function () {
	var c = this.checked;
	$('#gridselection_clasificacion_ontologia :checkbox').prop('checked',c);
});
$('#all_selecc_clasificacion_ontologia').click(function () {
	var c = this.checked;
	$('#gridselection_clasificacion_ontologia :checkbox').prop('checked',c);
});

function resetclasificacion_ontologiaForm() {
	$('#select2-id_ontologia-container').html('');
	Clasificacion_ontologia.combobox_ontologia.append('<option selected="" value=""></option>').change();
	$('#select2-id_clasificacion-container').html('');
	Clasificacion_ontologia.combobox_clasificaciones.append('<option selected="" value=""></option>').change();
	Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').resetForm(true);
}

