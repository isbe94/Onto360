/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/



function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}

		$("#text-search-experticia").keyup(function (event) {
		    var q = $("#text-search-experticia").val();
		    var grid = $("#gridselection_experticia").data("kendoGrid");
		    grid.dataSource.query({
		        page: 1,
		        pageSize: 20,
		        filter: {
		            logic: "or",
		            filters: [

		                {field: "grado_experiencia", operator: "contains", value: q}

		            ]
		        }
		    });
		});
		$("#clear-filter-experticia").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_experticia").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-experticia").val('')
		});
		

$("#btn_modal_experticia").click(function() {
	Experticia.oldElement=null;
    $('#idexperticia').val('-1');
    Experticia.experticia_form.data('bootstrapValidator').resetForm(true);
    $('#experticia_form')[0].reset();
	 $('#btnaction_experticia').html('Guardar');
	 $("#title_experticia").html('Insertar Experticia');
	 $("#taskexperticia").val('insert');
	 $('#btnaction_experticia_new').show();
    $("#modal_experticia").modal();
	});

$("#reload_experticia").click(function() {
	if($('#taskexperticia').val()!='update') {
		resetexperticiaForm();
	}
	else {
		Experticia.experticia_form.data('bootstrapValidator').resetForm(true);
	 	$("#grado_experiencia").val($.trim(Experticia.oldElement.grado_experiencia));
	 	$('#idexperticia').val(experticia.oldElement.idexperticia);
	 	$("#taskexperticia").val('update');
		Experticia.experticia_form.data('bootstrapValidator').validate();
	}
});

function showUpdate_experticia(e) {

    Experticia.experticia_form.data('bootstrapValidator').resetForm(true);
	 var dataItem=Experticia.finditem(e.id);
	 Experticia.oldElement= dataItem;
	 $('#idexperticia').val(dataItem.idexperticia);
	 	$("#grado_experiencia").val($.trim(Experticia.oldElement.grado_experiencia));
	 $("#taskexperticia").val('update');
	 $('#btnaction_experticia_new').hide();
	 $('#btnaction_experticia').html('Actualizar');
	 $("#title_experticia").html('Actualizar Experticia');
	 $("#modal_experticia").modal();
	}


//Boton Accion
$('.btnaction').click(function () {
	 var btnid=this.id;
    Experticia.experticia_form.data('bootstrapValidator').validate();
        if(Experticia.experticia_form.data('bootstrapValidator').isValid())
			{
       		var experticia={};
       		experticia.grado_experiencia=$("#grado_experiencia").val();
       			var url=urlhome+"gestion/experticia/create";
					var title="Insertando elemento...";
        	if($('#taskexperticia').val()=="update")
        		{
            		var url=urlhome+"gestion/experticia/update";
					title="Actualizando elemento...";
					$('#btnaction_experticia_new').hide();
            		experticia.idexperticia=Experticia.oldElement.idexperticia;
        		
        		}
        		Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', title,'center');
        		if(btnid.indexOf('new')!=-1 && $('#taskexperticia').val() != 'update')
         $.ajax({
            type: "POST",
            url:url,
            data:{
            Experticia:experticia,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El experticia fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Experticia.gridDataSource.read();
                    $.noty.closeAll();
				 resetexperticiaForm();            },
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
            Experticia:experticia,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    if($('#taskexperticia').val()=='update') {
                        message = 'El elemento fue actualizado con exito'
                        accion='actualizado';

                    }
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El experticia fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                    if($('#taskexperticia').val()=='update')
                        message='Error en actualizacion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Experticia.gridDataSource.read();
                    $.noty.closeAll();
                $("#modal_experticia").modal('hide');
            },
            error:function(response){
               if(response)
                {
                     Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
                }
                    $.noty.closeAll();
                $("#modal_experticia").modal('hide');
            }
        });

	}
});

//Eliminar elemento
				function delete_element_experticia(e)
				{
				    var dataItem=Experticia.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Experticia?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/gestion/experticia/delete",
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
				                    Experticia.gridDataSource.read();
                        			$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Experticia.gridDataSource.read();
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
	$('#deletebutton_experticia').click(function()
	 {
	  var checkbox_checked=$('#gridselection_experticia .check_row:checked');
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Experticia.finditem($(this).attr('id'));
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
				                url:urlhome+"/gestion/experticia/delete",
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
				                    Experticia.gridDataSource.read();
				                	$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Experticia.gridDataSource.read();
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
	$("#excel_experticia").click(function() {
				var list='';
				var filters =  Experticia.gridDataSource.filter();
				if(filters) {
					var allData = Experticia.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Experticia.gridDataSource.data();
				$('#experticia_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#pdf_experticia").click(function() {
    $('#list_experticia_pdf').modal();
    $("#tbody_table_experticia").html('');
    var list='';
    var filters =  Experticia.gridDataSource.filter();
    if(filters) {
        var allData = Experticia.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Experticia.gridDataSource.data();
    list.forEach(Experticia.list_pdf);
});

$("#export_experticia_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_experticia").html('');
    		    var list='';
    		    var filters =  Experticia.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Experticia.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Experticia.gridDataSource.data();
    		    list.forEach(Experticia.list_pdf);
		    kendo.drawing.drawDOM($("#table_experticia_pdf"))
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
		            $('#list_experticia_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Experticia_Report_PDF.pdf",
		                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
		            });
		        });
		});

$("#excel_experticia_importar").click(function() {
	$('#import_experticia').modal();
});


$("#importar_experticia_excel").click(function() {
		if(Experticia.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"gestion/experticia/load_excel";
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
									Experticia.gridDataSource.read();
									$('#import_experticia').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_experticia').click(function () {
    var c = this.checked;
    $('#gridselection_experticia :checkbox').prop('checked',c);
});

function resetexperticiaForm() {
		Experticia.experticia_form.data('bootstrapValidator').resetForm(true);
 }

