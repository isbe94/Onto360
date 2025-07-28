/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/




function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}


		$("#text-search-cuestionario").keyup(function (event) {
		    var q = $("#text-search-cuestionario").val();
		    var grid = $("#gridselection_cuestionario").data("kendoGrid");
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
		$("#clear-filter-cuestionario").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_cuestionario").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-cuestionario").val('')
		});
		

$("#reload_cuestionario").click(function() {
	if($('#taskcuestionario').val()!='update') {
		resetcuestionarioForm();
	}
	else {
		Cuestionario.cuestionario_form.data('bootstrapValidator').resetForm(true);
		$("#resp_correcta").val($.trim(Cuestionario.oldElement.resp_correcta));
	 	Cuestionario.combobox_pregunta.append('<option selected="" value="'+Cuestionario.oldElement.id_pregunta+'">'+Cuestionario.oldElement.pregunta+'</option>').change();
	 	Cuestionario.combobox_pregunta.val(Cuestionario.oldElement.id_pregunta);
	 	$('#idcuestionario').val(cuestionario.oldElement.idcuestionario);
	 	$("#taskcuestionario").val('update');
		Cuestionario.cuestionario_form.data('bootstrapValidator').validate();
	}
});

$("#pdf_cuestionario").click(function() {
    $('#list_cuestionario_pdf').modal();
    $("#tbody_table_cuestionario").html('');
    var list='';
    var filters =  Cuestionario.gridDataSource.filter();
    if(filters) {
        var allData = Cuestionario.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Cuestionario.gridDataSource.data();
    list.forEach(Cuestionario.list_pdf);
});

	$("#excel_cuestionario").click(function() {
				var list='';
				var filters =  Cuestionario.gridDataSource.filter();
				if(filters) {
					var allData = Cuestionario.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Cuestionario.gridDataSource.data();
				$('#cuestionario_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#export_cuestionario_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_cuestionario").html('');
    		    var list='';
    		    var filters =  Cuestionario.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Cuestionario.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Cuestionario.gridDataSource.data();
    		    list.forEach(Cuestionario.list_pdf);
		    kendo.drawing.drawDOM($("#table_cuestionario_pdf"))
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
		            $('#list_cuestionario_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Cuestionario_Report_PDF.pdf",
		                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
		            });
		        });
		});

$("#excel_cuestionario_importar").click(function() {
	$('#import_cuestionario').modal();
});


$("#importar_cuestionario_excel").click(function() {
		if(Cuestionario.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"gestion/cuestionario/load_excel";
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
									Cuestionario.gridDataSource.read();
									$('#import_cuestionario').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_cuestionario').click(function () {
    var c = this.checked;
    $('#gridselection_cuestionario :checkbox').prop('checked',c);
});

//Eliminar elemento
				function delete_element_cuestionario(e)
				{
				    var dataItem=Cuestionario.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Cuestionario?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/gestion/cuestionario/delete",
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
				                    Cuestionario.gridDataSource.read();
                        			$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Cuestionario.gridDataSource.read();
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
	$('#deletebutton_cuestionario').click(function()
	 {
	  var checkbox_checked=$('#gridselection_cuestionario .check_row:checked');
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Cuestionario.finditem($(this).attr('id'));
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
				                url:urlhome+"/gestion/cuestionario/delete",
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
				                    Cuestionario.gridDataSource.read();
				                	$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Cuestionario.gridDataSource.read();
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
