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

		                {field: "dominio", operator: "contains", value: q},

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
		

$("#reload_clasificacion_ontologia").click(function() {
	if($('#taskclasificacion_ontologia').val()!='update') {
		resetclasificacion_ontologiaForm();
	}
	else {
		Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').resetForm(true);
	 	Clasificacion_ontologia.combobox_ontologia.append('<option selected="" value="'+Clasificacion_ontologia.oldElement.id_ontologia+'">'+Clasificacion_ontologia.oldElement.dominio+'</option>').change();
	 	Clasificacion_ontologia.combobox_ontologia.val(Clasificacion_ontologia.oldElement.id_ontologia);
	 	Clasificacion_ontologia.combobox_clasificaciones.append('<option selected="" value="'+Clasificacion_ontologia.oldElement.id_clasificacion+'">'+Clasificacion_ontologia.oldElement.clasificacion+'</option>').change();
	 	Clasificacion_ontologia.combobox_clasificaciones.val(Clasificacion_ontologia.oldElement.id_clasificacion);
	 	$('#idclasifonto').val(clasificacion_ontologia.oldElement.idclasifonto);
	 	$("#taskclasificacion_ontologia").val('update');
		Clasificacion_ontologia.clasificacion_ontologia_form.data('bootstrapValidator').validate();
	}
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

//Eliminar elemento
				function delete_element_clasificacion_ontologia(e)
				{
				    var dataItem=Clasificacion_ontologia.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Clasificacion_ontologia?</p> ",
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
									l.stop();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Clasificacion_ontologia.gridDataSource.read();
                        			$.noty.closeAll();
									l.stop();
				                }
				            });
						    $.noty.closeAll();
				        }
				        else{
				                $.noty.closeAll();
								l.stop();
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
							l.start();
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/gestion/clasificacion_ontologia/delete",
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
