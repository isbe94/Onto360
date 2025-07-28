/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/



function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}

		$("#text-search-categoriacientifica").keyup(function (event) {
		    var q = $("#text-search-categoriacientifica").val();
		    var grid = $("#gridselection_categoriacientifica").data("kendoGrid");
		    grid.dataSource.query({
		        page: 1,
		        pageSize: 20,
		        filter: {
		            logic: "or",
		            filters: [

		                {field: "categcient", operator: "contains", value: q}

		            ]
		        }
		    });
		});
		$("#clear-filter-categoriacientifica").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_categoriacientifica").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-categoriacientifica").val('')
		});
		

$("#btn_modal_categoriacientifica").click(function() {
	Categoriacientifica.oldElement=null;
    $('#idcatcientifica').val('-1');
    Categoriacientifica.categoriacientifica_form.data('bootstrapValidator').resetForm(true);
    $('#categoriacientifica_form')[0].reset();
	 $('#btnaction_categoriacientifica').html('Guardar');
	 $("#title_categoriacientifica").html('Insertar Categoria Científica');
	 $("#taskcategoriacientifica").val('insert');
	 $('#btnaction_categoriacientifica_new').show();
    $("#modal_categoriacientifica").modal();
	});

$("#reload_categoriacientifica").click(function() {
	if($('#taskcategoriacientifica').val()!='update') {
		resetcategoriacientificaForm();
	}
	else {
		Categoriacientifica.categoriacientifica_form.data('bootstrapValidator').resetForm(true);
	 	$("#categcient").val($.trim(Categoriacientifica.oldElement.categcient));
	 	$('#idcatcientifica').val(categoriacientifica.oldElement.idcatcientifica);
	 	$("#taskcategoriacientifica").val('update');
		Categoriacientifica.categoriacientifica_form.data('bootstrapValidator').validate();
	}
});

function showUpdate_categoriacientifica(e) {

    Categoriacientifica.categoriacientifica_form.data('bootstrapValidator').resetForm(true);
	 var dataItem=Categoriacientifica.finditem(e.id);
	 Categoriacientifica.oldElement= dataItem;
	 $('#idcatcientifica').val(dataItem.idcatcientifica);
	 	$("#categcient").val($.trim(Categoriacientifica.oldElement.categcient));
	 $("#taskcategoriacientifica").val('update');
	 $('#btnaction_categoriacientifica_new').hide();
	 $('#btnaction_categoriacientifica').html('Actualizar');
	 $("#title_categoriacientifica").html('Actualizar Categoría Científica');
	 $("#modal_categoriacientifica").modal();
	}


//Boton Accion
$('.btnaction').click(function () {
	 var btnid=this.id;
    Categoriacientifica.categoriacientifica_form.data('bootstrapValidator').validate();
        if(Categoriacientifica.categoriacientifica_form.data('bootstrapValidator').isValid())
			{
       		var categoriacientifica={};
       		categoriacientifica.categcient=$("#categcient").val();
       			var url=urlhome+"nomencladores/categoriacientifica/create";
					var title="Insertando elemento...";
        	if($('#taskcategoriacientifica').val()=="update")
        		{
            		var url=urlhome+"nomencladores/categoriacientifica/update";
					title="Actualizando elemento...";
					$('#btnaction_categoriacientifica_new').hide();
            		categoriacientifica.idcatcientifica=Categoriacientifica.oldElement.idcatcientifica;
        		
        		}
				
        		Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', title,'center');
        		if(btnid.indexOf('new')!=-1 && $('#taskcategoriacientifica').val() != 'update')
         $.ajax({
            type: "POST",
            url:url,
            data:{
            Categoriacientifica:categoriacientifica,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El categoriacientifica fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Categoriacientifica.gridDataSource.read();
                    $.noty.closeAll();
				 resetcategoriacientificaForm();            },
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
            Categoriacientifica:categoriacientifica,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    if($('#taskcategoriacientifica').val()=='update') {
                        message = 'El elemento fue actualizado con exito'
                        accion='actualizado';

                    }
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El categoriacientifica fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                    if($('#taskcategoriacientifica').val()=='update')
                        message='Error en actualizacion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Categoriacientifica.gridDataSource.read();
                    $.noty.closeAll();
                $("#modal_categoriacientifica").modal('hide');
            },
            error:function(response){
               if(response)
                {
                     Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
                }
                    $.noty.closeAll();
                $("#modal_categoriacientifica").modal('hide');
            }
        });

	}
});

//Eliminar elemento
				function delete_element_categoriacientifica(e)
				{
				    var dataItem=Categoriacientifica.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Categoría científica?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/nomencladores/categoriacientifica/delete",
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
				                    Categoriacientifica.gridDataSource.read();
                        			$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Categoriacientifica.gridDataSource.read();
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
	$('#deletebutton_categoriacientifica').click(function()
	 {
	  var checkbox_checked=$('#gridselection_categoriacientifica .check_row:checked');
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Categoriacientifica.finditem($(this).attr('id'));
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
				                url:urlhome+"/nomencladores/categoriacientifica/delete",
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
				                    Categoriacientifica.gridDataSource.read();
				                	$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Categoriacientifica.gridDataSource.read();
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
	$("#excel_categoriacientifica").click(function() {
				var list='';
				var filters =  Categoriacientifica.gridDataSource.filter();
				if(filters) {
					var allData = Categoriacientifica.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Categoriacientifica.gridDataSource.data();
				$('#categoriacientifica_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#pdf_categoriacientifica").click(function() {
    $('#list_categoriacientifica_pdf').modal();
    $("#tbody_table_categoriacientifica").html('');
    var list='';
    var filters =  Categoriacientifica.gridDataSource.filter();
    if(filters) {
        var allData = Categoriacientifica.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Categoriacientifica.gridDataSource.data();
    list.forEach(Categoriacientifica.list_pdf);
});

$("#export_categoriacientifica_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_categoriacientifica").html('');
    		    var list='';
    		    var filters =  Categoriacientifica.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Categoriacientifica.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Categoriacientifica.gridDataSource.data();
    		    list.forEach(Categoriacientifica.list_pdf);
		    kendo.drawing.drawDOM($("#table_categoriacientifica_pdf"))
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
		            $('#list_categoriacientifica_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Categoriacientifica_Report_PDF.pdf"
		                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
		            });
		        });
		});

$("#excel_categoriacientifica_importar").click(function() {
	$('#import_categoriacientifica').modal();
});


$("#importar_categoriacientifica_excel").click(function() {
		if(Categoriacientifica.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"nomencladores/categoriacientifica/load_excel";
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
									Categoriacientifica.gridDataSource.read();
									$('#import_categoriacientifica').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_categoriacientifica').click(function () {
    var c = this.checked;
    $('#gridselection_categoriacientifica :checkbox').prop('checked',c);
});

function resetcategoriacientificaForm() {
		Categoriacientifica.categoriacientifica_form.data('bootstrapValidator').resetForm(true);
 }

