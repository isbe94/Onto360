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
		

$("#reload_pregunta_respuestas").click(function() {
	if($('#taskpregunta_respuestas').val()!='update') {
		resetpregunta_respuestasForm();
	}
	else {
		Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').resetForm(true);
		$("#resp_correcta").val($.trim(Pregunta_respuestas.oldElement.resp_correcta));
		Pregunta_respuestas.combobox_pregunta.append('<option selected="" value="'+Pregunta_respuestas.oldElement.id_pregunta+'">'+Pregunta_respuestas.oldElement.pregunta+'</option>').change();
		Pregunta_respuestas.combobox_pregunta.val(Pregunta_respuestas.oldElement.id_pregunta);
	 	$('#idpregunta_respuestas').val(pregunta_respuestas.oldElement.idpregunta_respuestas);
	 	$("#taskpregunta_respuestas").val('update');
		Pregunta_respuestas.pregunta_respuestas_form.data('bootstrapValidator').validate();
	}
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

//Eliminar elemento
				function delete_element_pregunta_respuestas(e)
				{
				    var dataItem=Pregunta_respuestas.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar esta pregunta con su respuesta?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
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
				        else
				                $.noty.closeAll();
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
				                url:urlhome+"/gestion/pregunta_respuestas/delete",
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
