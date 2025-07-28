/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/



function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}

		$("#text-search-clasificacion").keyup(function (event) {
		    var q = $("#text-search-clasificacion").val();
		    var grid = $("#gridselection_clasificacion").data("kendoGrid");
		    grid.dataSource.query({
		        page: 1,
		        pageSize: 20,
		        filter: {
		            logic: "or",
		            filters: [

		                {field: "clasificacion", operator: "contains", value: q}

		            ]
		        }
		    });
		});
		$("#clear-filter-clasificacion").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_clasificacion").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-clasificacion").val('')
		});
		

$("#btn_modal_clasificacion").click(function() {
	Clasificacion.oldElement=null;
    $('#idclasificacion').val('-1');
    Clasificacion.clasificacion_form.data('bootstrapValidator').resetForm(true);
    $('#clasificacion_form')[0].reset();
	 $('#btnaction_clasificacion').html('Guardar');
	 $("#title_clasificacion").html('Insertar Clasificacion');
	 $("#taskclasificacion").val('insert');
	 $('#btnaction_clasificacion_new').show();
    $("#modal_clasificacion").modal();
	});

$("#reload_clasificacion").click(function() {
	if($('#taskclasificacion').val()!='update') {
		resetclasificacionForm();
	}
	else {
		Clasificacion.clasificacion_form.data('bootstrapValidator').resetForm(true);
	 	$("#clasificacion").val($.trim(Clasificacion.oldElement.clasificacion));
	 	$('#idclasificacion').val(clasificacion.oldElement.idclasificacion);
	 	$("#taskclasificacion").val('update');
		Clasificacion.clasificacion_form.data('bootstrapValidator').validate();
	}
});

function showUpdate_clasificacion(e) {

    Clasificacion.clasificacion_form.data('bootstrapValidator').resetForm(true);
	 var dataItem=Clasificacion.finditem(e.id);
	 Clasificacion.oldElement= dataItem;
	 $('#idclasificacion').val(dataItem.idclasificacion);
	 	$("#clasificacion").val($.trim(Clasificacion.oldElement.clasificacion));
	 $("#taskclasificacion").val('update');
	 $('#btnaction_clasificacion_new').hide();
	 $('#btnaction_clasificacion').html('Actualizar');
	 $("#title_clasificacion").html('Actualizar Clasificacion');
	 $("#modal_clasificacion").modal();
	}


//Boton Accion
$('.btnaction').click(function () {
	 var btnid=this.id;
    Clasificacion.clasificacion_form.data('bootstrapValidator').validate();
        if(Clasificacion.clasificacion_form.data('bootstrapValidator').isValid())
			{
				 /*CREANDO LOADING BUTTONS*/
				
		       
       		var clasificacion={};
       		clasificacion.clasificacion=$("#clasificacion").val();
       			var url=urlhome+"nomencladores/clasificacion/create";
					var title="Insertando elemento...";
        	if($('#taskclasificacion').val()=="update")
        		{
            		var url=urlhome+"nomencladores/clasificacion/update";
					title="Actualizando elemento...";
					$('#btnaction_clasificacion_new').hide();
            		clasificacion.idclasificacion=Clasificacion.oldElement.idclasificacion;
        		
        		}
        		if(btnid.indexOf('new')!=-1 && $('#taskclasificacion').val() != 'update')
         $.ajax({
            type: "POST",
            url:url,
            data:{
            Clasificacion:clasificacion,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con éxito'
                    var accion='insertado';
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','La clasificación fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en inserción'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Clasificacion.gridDataSource.read();
                    $.noty.closeAll();
                    
				 resetclasificacionForm();            },
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
            Clasificacion:clasificacion,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    if($('#taskclasificacion').val()=='update') {
                        message = 'El elemento fue actualizado con exito'
                        accion='actualizado';

                    }
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El clasificacion fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                    if($('#taskclasificacion').val()=='update')
                        message='Error en actualizacion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Clasificacion.gridDataSource.read();
                    $.noty.closeAll();
                   
                $("#modal_clasificacion").modal('hide');
            },
            error:function(response){
               if(response)
                {
                     Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
                }
                    $.noty.closeAll();
                   
                $("#modal_clasificacion").modal('hide');
            }
        });

	}
});

//Eliminar elemento
				function delete_element_clasificacion(e)
				{
				    var dataItem=Clasificacion.finditem(e.id);
					var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>¿Desea eliminar esta Clasificación?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
											            $.ajax({
				                type: "POST",
				                url:urlhome+"/nomencladores/clasificacion/delete",
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
				                    Clasificacion.gridDataSource.read();
                        			$.noty.closeAll();
									
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Clasificacion.gridDataSource.read();
                        			$.noty.closeAll();
									l.stop();
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
	$('#deletebutton_clasificacion').click(function()
	 {
	  var checkbox_checked=$('#gridselection_clasificacion .check_row:checked');
	  
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Clasificacion.finditem($(this).attr('id'));
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
				                url:urlhome+"/nomencladores/clasificacion/delete",
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
				                    Clasificacion.gridDataSource.read();
				                	$.noty.closeAll();
									
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Clasificacion.gridDataSource.read();
				                	$.noty.closeAll();
									l.stop();
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
	$("#excel_clasificacion").click(function() {
				var list='';
				var filters =  Clasificacion.gridDataSource.filter();
				if(filters) {
					var allData = Clasificacion.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Clasificacion.gridDataSource.data();
				$('#clasificacion_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#pdf_clasificacion").click(function() {
    $('#list_clasificacion_pdf').modal();
    $("#tbody_table_clasificacion").html('');
    var list='';
    var filters =  Clasificacion.gridDataSource.filter();
    if(filters) {
        var allData = Clasificacion.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Clasificacion.gridDataSource.data();
    list.forEach(Clasificacion.list_pdf);
});

$("#export_clasificacion_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_clasificacion").html('');
    		    var list='';
    		    var filters =  Clasificacion.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Clasificacion.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Clasificacion.gridDataSource.data();
    		    list.forEach(Clasificacion.list_pdf);
		    kendo.drawing.drawDOM($("#table_clasificacion_pdf"))
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
		            $('#list_clasificacion_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Clasificacion_Report_PDF.pdf"
		            });
		        });
		});

$("#excel_clasificacion_importar").click(function() {
	$('#import_clasificacion').modal();
});


$("#importar_clasificacion_excel").click(function() {
		if(Clasificacion.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"nomencladores/clasificacion/load_excel";
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
									Clasificacion.gridDataSource.read();
									$('#import_clasificacion').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_clasificacion').click(function () {
    var c = this.checked;
    $('#gridselection_clasificacion :checkbox').prop('checked',c);
});

function resetclasificacionForm() {
		Clasificacion.clasificacion_form.data('bootstrapValidator').resetForm(true);
 }

