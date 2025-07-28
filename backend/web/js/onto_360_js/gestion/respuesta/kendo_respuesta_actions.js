/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/




function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}


		$("#text-search-respuesta").keyup(function (event) {
		    var q = $("#text-search-respuesta").val();
		    var grid = $("#gridselection_respuesta").data("kendoGrid");
		    grid.dataSource.query({
		        page: 1,
		        pageSize: 20,
		        filter: {
		            logic: "or",
		            filters: [

		                {field: "respuesta", operator: "contains", value: q}

		            ]
		        }
		    });
		});
		$("#clear-filter-respuesta").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_respuesta").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-respuesta").val('')
		});
		

$("#reload_respuesta").click(function() {
	if($('#taskrespuesta').val()!='update') {
		resetrespuestaForm();
	}
	else {
		Respuesta.respuesta_form.data('bootstrapValidator').resetForm(true);
	 	ComponentsRespuesta.initCkeditor_respuesta();
    	CKEDITOR.instances.respuesta.setData(Respuesta.oldElement.respuesta);
	 	$("#respuesta").val($.trim(Respuesta.oldElement.respuesta));
	 	$('#idrespuesta').val(respuesta.oldElement.idrespuesta);
	 	$("#taskrespuesta").val('update');
		Respuesta.respuesta_form.data('bootstrapValidator').validate();
	}
});

$("#pdf_respuesta").click(function() {
    $('#list_respuesta_pdf').modal();
    $("#tbody_table_respuesta").html('');
    var list='';
    var filters =  Respuesta.gridDataSource.filter();
    if(filters) {
        var allData = Respuesta.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Respuesta.gridDataSource.data();
    list.forEach(Respuesta.list_pdf);
});

	$("#excel_respuesta").click(function() {
				var list='';
				var filters =  Respuesta.gridDataSource.filter();
				if(filters) {
					var allData = Respuesta.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Respuesta.gridDataSource.data();
				$('#respuesta_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#export_respuesta_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_respuesta").html('');
    		    var list='';
    		    var filters =  Respuesta.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Respuesta.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Respuesta.gridDataSource.data();
    		    list.forEach(Respuesta.list_pdf);
		    kendo.drawing.drawDOM($("#table_respuesta_pdf"))
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
		            $('#list_respuesta_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Respuesta_Report_PDF.pdf",
		                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
		            });
		        });
		});

$("#excel_respuesta_importar").click(function() {
	$('#import_respuesta').modal();
});


$("#importar_respuesta_excel").click(function() {
		if(Respuesta.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"gestion/respuesta/load_excel";
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
									Respuesta.gridDataSource.read();
									$('#import_respuesta').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_respuesta').click(function () {
    var c = this.checked;
    $('#gridselection_respuesta :checkbox').prop('checked',c);
});

//Eliminar elemento
				function delete_element_respuesta(e)
				{
				    var dataItem=Respuesta.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Respuesta?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/gestion/respuesta/delete",
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
				                    Respuesta.gridDataSource.read();
                        			$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Respuesta.gridDataSource.read();
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
	$('#deletebutton_respuesta').click(function()
	 {
	  var checkbox_checked=$('#gridselection_respuesta .check_row:checked');
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Respuesta.finditem($(this).attr('id'));
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
				                url:urlhome+"/gestion/respuesta/delete",
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
				                    Respuesta.gridDataSource.read();
				                	$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Respuesta.gridDataSource.read();
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
