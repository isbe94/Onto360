/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/



function setsubmitbtn(e){
	$('#btnsubmit').val(e.id);
	return true;
}

$("#text-search-ontologia").keyup(function (event) {
	var q = $("#text-search-ontologia").val();
	var grid = $("#gridselection_ontologia").data("kendoGrid");
	grid.dataSource.query({
		page: 1,
		pageSize: 20,
		filter: {
			logic: "or",
			filters: [

				{field: "dominio", operator: "contains", value: q},

				{field: "fichero", operator: "contains", value: q},

				{field: "nombre", operator: "contains", value: q},

				{field: "tecnologia", operator: "contains", value: q},

				{field: "name_space", operator: "contains", value: q},
				
				{field: "lenguaje", operator: "contains", value: q},

				{field: "version", operator: "contains", value: q}

			]
		}
	});
});
$("#clear-filter-ontologia").click(function (event) {
	event.preventDefault();
	var datasource = $("#gridselection_ontologia").data("kendoGrid").dataSource;
	//Clear filters:
	datasource.filter([]);
	$("#text-search-ontologia").val('')
});


$("#btn_modal_ontologia").click(function() {
	Ontologia.oldElement=null;
	$('#idontologia').val('-1');
	Ontologia.ontologia_form.data('bootstrapValidator').resetForm(true);
	$('#ontologia_form')[0].reset();
	$('#btnaction_ontologia').html('Guardar');
	$("#title_ontologia").html('Insertar Ontologia');
	$("#taskontologia").val('insert');
	$('#btnaction_ontologia_new').show();
	$('#select2-id_tecnologia_combo-container').html('');
	$("#modal_ontologia").modal();
});

$("#reload_ontologia").click(function() {
	if($('#taskontologia').val()!='update') {
		resetontologiaForm();
	}
	else {
		Ontologia.ontologia_form.data('bootstrapValidator').resetForm(true);
		$("#dominio").val($.trim(Ontologia.oldElement.dominio));
		$("#fichero").val($.trim(Ontologia.oldElement.fichero));
		$("#nombre").val($.trim(Ontologia.oldElement.nombre));
		$("#name_space").val($.trim(Ontologia.oldElement.name_space));
		$("#lenguaje").val($.trim(Ontologia.oldElement.lenguaje));
		$("#version").val($.trim(Ontologia.oldElement.version));
		Ontologia.combobox_tecnologia.append('<option selected="" value="'+Ontologia.oldElement.id_tecnologia+'">'+Ontologia.oldElement.tecnologia+'</option>').change();
		Ontologia.combobox_tecnologia.val(Ontologia.oldElement.id_tecnologia);
		$('#idontologia').val(ontologia.oldElement.idontologia);
		$("#taskontologia").val('update');
		Ontologia.ontologia_form.data('bootstrapValidator').validate();
	}
});

function showUpdate_ontologia(e) {

	
	Ontologia.ontologia_form.data('bootstrapValidator').resetForm(true);
	var dataItem=Ontologia.finditem(e.id);
	Ontologia.oldElement= dataItem;
	$('#idontologia').val(dataItem.idontologia);
	$("#dominio").val($.trim(Ontologia.oldElement.dominio));
	$("#fichero").attr("src", urlhome + "/ficheros/ontologias/" + Ontologia.oldElement.fichero);
	$("#nombre").val($.trim(Ontologia.oldElement.nombre));
	$("#name_space").val($.trim(Ontologia.oldElement.name_space));
	$("#lenguaje").val($.trim(Ontologia.oldElement.lenguaje));
	$("#version").val($.trim(Ontologia.oldElement.version));
	$("#taskontologia").val('update');
	$('#btnaction_ontologia_new').hide();
	$('#btnaction_ontologia').html('Actualizar');
	$("#title_ontologia").html('Actualizar Ontologia');
	$("#modal_ontologia").modal();
}


//Boton Accion
$('.btnaction').click(function () {
	var btnid=this.id;
	Ontologia.ontologia_form.data('bootstrapValidator').validate();
	if(Ontologia.ontologia_form.data('bootstrapValidator').isValid())
	{
		/*CREANDO LOADING BUTTONS*/
		var data = new FormData();
		var ontologia={};
		ontologia.dominio=$("#dominio").val();
		ontologia.fichero=$("#fichero").val();
		ontologia.nombre=$("#nombre").val();
		ontologia.name_space=$("#name_space").val();
		ontologia.lenguaje=$("#lenguaje").val();
		ontologia.version=$("#version").val();
		var url=urlhome+"gestion/ontologia/create";
		var title="Insertando elemento...";
		if($('#taskontologia').val()=="update")
		{
			var url=urlhome+"gestion/ontologia/update";
			title="Actualizando elemento...";
			$('#btnaction_ontologia_new').hide();
			ontologia.idontologia=Ontologia.oldElement.idontologia;

		}
		data.append('Ontologia',  JSON.stringify(ontologia));
		data.append('_onto_CSRF', _csrf);
		var fichero = $('#fichero')[0].files[0];
		data.append('fichero', fichero);

		Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', title, 'center');
		if(btnid.indexOf('new')!=-1 && $('#taskontologia').val() != 'update')
			$.ajax({
				type: "POST",
				url:url,
				contentType: false, //Debe estar en false para que pase el objeto sin procesar
				processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
				cache: false, //Para que el formulario no guarde cache
				data:data,
				success:function(response){
					if(response.success)
					{
						var message='El elemento fue insertado con exito'
						var accion='insertado';
						Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El ontologia fue '+accion+' correctamente', message,'topRight');
					}
					else
					{
						var message='Error en insercion'
						Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
					}
					Ontologia.gridDataSource.read();
					$.noty.closeAll();

					resetontologiaForm();            },
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
				contentType: false, //Debe estar en false para que pase el objeto sin procesar
				processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
				cache: false, //Para que el formulario no guarde cache
				data:data,
				success:function(response){
					if(response.success)
					{
						var message='El elemento fue insertado con exito'
						var accion='insertado';
						if($('#taskontologia').val()=='update') {
							message = 'El elemento fue actualizado con exito'
							accion='actualizado';

						}
						Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El ontologia fue '+accion+' correctamente', message,'topRight');
					}
					else
					{
						var message='Error en insercion'
						if($('#taskontologia').val()=='update')
							message='Error en actualizacion'
						Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
					}
					Ontologia.gridDataSource.read();
					$.noty.closeAll();

					$("#modal_ontologia").modal('hide');
				},
				error:function(response){
					if(response)
					{
						Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
					}
					$.noty.closeAll();

					$("#modal_ontologia").modal('hide');
				}
			});

	}
});

//Eliminar elemento
function delete_element_ontologia(e)
{
	var dataItem=Ontologia.finditem(e.id);
	var array=[];
	array.push(dataItem);
	$.MetroMessageBox({
			title: "<span class='fa fa-trash-o'></span> Eliminar ",
			content: "<p class='fg-white'>Desea eliminar este Ontologia?</p> ",
			NormalButton: "#232323",
			ActiveButton: "#008a00 ",
			buttons: " [Cancelar][Aceptar]"
		}, function (a) {
			if(a=="Aceptar")
			{
				$.ajax({
					type: "POST",
					url:urlhome+"/gestion/ontologia/delete",
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
						Ontologia.gridDataSource.read();
						$.noty.closeAll();

					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Ontologia.gridDataSource.read();
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
$('#deletebutton_ontologia').click(function()
{
	var checkbox_checked=$('#gridselection_ontologia .check_row:checked');

	if(checkbox_checked.length==0)
	{

		Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
		return false;
	}
	var array=[];
	checkbox_checked.each(function(){
			var dataItem=Ontologia.finditem($(this).attr('id'));
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
					url:urlhome+"/gestion/ontologia/delete",
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
						Ontologia.gridDataSource.read();
						$.noty.closeAll();

					},
					error:function(response){
						if(response)
						{
							Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
						}
						Ontologia.gridDataSource.read();
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
$("#excel_ontologia").click(function() {
	var list='';
	var filters =  Ontologia.gridDataSource.filter();
	if(filters) {
		var allData = Ontologia.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Ontologia.gridDataSource.data();
	$('#ontologia_export').val(JSON.stringify(list));
	$('#form_excel_export').submit();
});

$("#pdf_ontologia").click(function() {
	$('#list_ontologia_pdf').modal();
	$("#tbody_table_ontologia").html('');
	var list='';
	var filters =  Ontologia.gridDataSource.filter();
	if(filters) {
		var allData = Ontologia.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Ontologia.gridDataSource.data();
	list.forEach(Ontologia.list_pdf);
});

$("#export_ontologia_pdf").click(function() {
	$('body').modalmanager('loading');
	$("#tbody_table_ontologia").html('');
	var list='';
	var filters =  Ontologia.gridDataSource.filter();
	if(filters) {
		var allData = Ontologia.gridDataSource.data();
		var query = new kendo.data.Query(allData);
		list = query.filter(filters).data;
	}
	else
		list= Ontologia.gridDataSource.data();
	list.forEach(Ontologia.list_pdf);
	kendo.drawing.drawDOM($("#table_ontologia_pdf"))
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
			$('#list_ontologia_pdf').modal('hide');
			kendo.saveAs({
				dataURI: data,
				fileName: "Ontologia_Report_PDF.pdf"
			});
		});
});

$("#excel_ontologia_importar").click(function() {
	$('#import_ontologia').modal();
});


$("#importar_ontologia_excel").click(function() {
	if(Ontologia.importarbootstrapValidator.isValid())
	{
		var data= new FormData();
		var excel= $('#importar_excel')[0].files[0];
		data.append('excel',excel);
		data.append('_onto_CSRF',_csrf);
		var url=urlhome+"gestion/ontologia/load_excel";
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
					Ontologia.gridDataSource.read();
					$('#import_ontologia').modal('hide');
					Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
				}

			}
		});
	}
});

//Para chequear todos los elementos
$('#all_check_ontologia').click(function () {
	var c = this.checked;
	$('#gridselection_ontologia :checkbox').prop('checked',c);
});

function resetontologiaForm() {
	Ontologia.ontologia_form.data('bootstrapValidator').resetForm(true);
}

$("#fichero").change(function () {
	var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.owl|.rdf)$/;
	if (regex.test($(this).val().toLowerCase())) {
		if (false) {
			$("#image_autor")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
		}
		else {
			if ($(this)[0].files[0].size / 1048576 <= 2.097152) {
				if (typeof (FileReader) != "undefined") {
					var reader = new FileReader();
					reader.onload = function (e) {
						$("#image_autor").attr("src", e.target.result);
					}
					reader.readAsDataURL($(this)[0].files[0]);
				} else {
					alert("This browser does not support FileReader.");
				}

			}
		}
	}
});