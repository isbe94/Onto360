/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/



function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}

		$("#text-search-pregunta").keyup(function (event) {
		    var q = $("#text-search-pregunta").val();
		    var grid = $("#gridselection_pregunta").data("kendoGrid");
		    grid.dataSource.query({
		        page: 1,
		        pageSize: 20,
		        filter: {
		            logic: "or",
		            filters: [

		                {field: "pregunta", operator: "contains", value: q}

		            ]
		        }
		    });
		});
		$("#clear-filter-pregunta").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_pregunta").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-pregunta").val('')
		});
		

$("#btn_modal_pregunta").click(function() {
	Pregunta.oldElement=null;
    $('#idpregunta').val('-1');
    Pregunta.pregunta_form.data('bootstrapValidator').resetForm(true);
    $('#pregunta_form')[0].reset();
	 $('#btnaction_pregunta').html('Guardar');
	 $("#title_pregunta").html('Insertar Pregunta');
	 $("#taskpregunta").val('insert');
	 $('#btnaction_pregunta_new').show();
    $("#modal_pregunta").modal();
	});

$("#reload_pregunta").click(function() {
	if($('#taskpregunta').val()!='update') {
		resetpreguntaForm();
	}
	else {
		Pregunta.pregunta_form.data('bootstrapValidator').resetForm(true);
	 	$("#pregunta").val($.trim(Pregunta.oldElement.pregunta));
	 	$('#idpregunta').val(pregunta.oldElement.idpregunta);
	 	$("#taskpregunta").val('update');
		Pregunta.pregunta_form.data('bootstrapValidator').validate();
	}
});

function showUpdate_pregunta(e) {

    Pregunta.pregunta_form.data('bootstrapValidator').resetForm(true);
	 var dataItem=Pregunta.finditem(e.id);
	 Pregunta.oldElement= dataItem;
	 $('#idpregunta').val(dataItem.idpregunta);
	$("#pregunta").val($.trim(Pregunta.oldElement.pregunta));
	 $("#taskpregunta").val('update');
	 $('#btnaction_pregunta_new').hide();
	 $('#btnaction_pregunta').html('Actualizar');
	 $("#title_pregunta").html('Actualizar Pregunta');
	 $("#modal_pregunta").modal();
	}


//Boton Accion
$('.btnaction').click(function () {
	 var btnid=this.id;
    Pregunta.pregunta_form.data('bootstrapValidator').validate();
        if(Pregunta.pregunta_form.data('bootstrapValidator').isValid())
			{
       		var pregunta={};
       		pregunta.pregunta=$("#pregunta").val();
       			var url=urlhome+"gestion/pregunta/create";
					var title="Insertando elemento...";
        	if($('#taskpregunta').val()=="update")
        		{
            		var url=urlhome+"gestion/pregunta/update";
					title="Actualizando elemento...";
					$('#btnaction_pregunta_new').hide();
            		pregunta.idpregunta=Pregunta.oldElement.idpregunta;
        		
        		}
        		Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', title,'center');
        		if(btnid.indexOf('new')!=-1 && $('#taskpregunta').val() != 'update')
         $.ajax({
            type: "POST",
            url:url,
            data:{
            Pregunta:pregunta,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El pregunta fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Pregunta.gridDataSource.read();
                    $.noty.closeAll();
				 resetpreguntaForm();            },
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
            Pregunta:pregunta,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    if($('#taskpregunta').val()=='update') {
                        message = 'El elemento fue actualizado con exito'
                        accion='actualizado';

                    }
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El pregunta fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                    if($('#taskpregunta').val()=='update')
                        message='Error en actualizacion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Pregunta.gridDataSource.read();
                    $.noty.closeAll();
                $("#modal_pregunta").modal('hide');
            },
            error:function(response){
               if(response)
                {
                     Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
                }
                    $.noty.closeAll();
                $("#modal_pregunta").modal('hide');
            }
        });

	}
});

//Eliminar elemento
				function delete_element_pregunta(e)
				{
				    var dataItem=Pregunta.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Pregunta?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/gestion/pregunta/delete",
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
				                    Pregunta.gridDataSource.read();
                        			$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Pregunta.gridDataSource.read();
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

//Eliminar elemento
	$('#deletebutton_pregunta').click(function()
	 {
	  var checkbox_checked=$('#gridselection_pregunta .check_row:checked');
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Pregunta.finditem($(this).attr('id'));
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
				                url:urlhome+"/gestion/pregunta/delete",
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
				                    Pregunta.gridDataSource.read();
				                	$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Pregunta.gridDataSource.read();
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
	$("#excel_pregunta").click(function() {
				var list='';
				var filters =  Pregunta.gridDataSource.filter();
				if(filters) {
					var allData = Pregunta.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Pregunta.gridDataSource.data();
				$('#pregunta_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#pdf_pregunta").click(function() {
    $('#list_pregunta_pdf').modal();
    $("#tbody_table_pregunta").html('');
    var list='';
    var filters =  Pregunta.gridDataSource.filter();
    if(filters) {
        var allData = Pregunta.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Pregunta.gridDataSource.data();
    list.forEach(Pregunta.list_pdf);
});

$("#export_pregunta_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_pregunta").html('');
    		    var list='';
    		    var filters =  Pregunta.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Pregunta.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Pregunta.gridDataSource.data();
    		    list.forEach(Pregunta.list_pdf);
		    kendo.drawing.drawDOM($("#table_pregunta_pdf"))
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
		            $('#list_pregunta_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Pregunta_Report_PDF.pdf",
		                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
		            });
		        });
		});

$("#excel_pregunta_importar").click(function() {
	$('#import_pregunta').modal();
});


$("#importar_pregunta_excel").click(function() {
		if(Pregunta.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"gestion/pregunta/load_excel";
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
									Pregunta.gridDataSource.read();
									$('#import_pregunta').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_pregunta').click(function () {
    var c = this.checked;
    $('#gridselection_pregunta :checkbox').prop('checked',c);
});

function resetpreguntaForm() {
		Pregunta.pregunta_form.data('bootstrapValidator').resetForm(true);
 }

