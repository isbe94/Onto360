/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/



function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}

		$("#text-search-rol").keyup(function (event) {
		    var q = $("#text-search-rol").val();
		    var grid = $("#gridselection_rol").data("kendoGrid");
		    grid.dataSource.query({
		        page: 1,
		        pageSize: 20,
		        filter: {
		            logic: "or",
		            filters: [

		                {field: "rol", operator: "contains", value: q}

		            ]
		        }
		    });
		});
		$("#clear-filter-rol").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_rol").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-rol").val('')
		});
		

$("#btn_modal_rol").click(function() {
	Rol.oldElement=null;
    $('#idrol').val('-1');
    Rol.rol_form.data('bootstrapValidator').resetForm(true);
    $('#rol_form')[0].reset();
	 $('#btnaction_rol').html('Guardar');
	 $("#title_rol").html('Insertar Rol');
	 $("#taskrol").val('insert');
	 $('#btnaction_rol_new').show();
    $("#modal_rol").modal();
	});

$("#reload_rol").click(function() {
	if($('#taskrol').val()!='update') {
		resetrolForm();
	}
	else {
		Rol.rol_form.data('bootstrapValidator').resetForm(true);
	 	$("#rol").val($.trim(Rol.oldElement.rol));
	 	$('#idrol').val(rol.oldElement.idrol);
	 	$("#taskrol").val('update');
		Rol.rol_form.data('bootstrapValidator').validate();
	}
});

function showUpdate_rol(e) {

    Rol.rol_form.data('bootstrapValidator').resetForm(true);
	 var dataItem=Rol.finditem(e.id);
	 Rol.oldElement= dataItem;
	 $('#idrol').val(dataItem.idrol);
	 	$("#rol").val($.trim(Rol.oldElement.rol));
	 $("#taskrol").val('update');
	 $('#btnaction_rol_new').hide();
	 $('#btnaction_rol').html('Actualizar');
	 $("#title_rol").html('Actualizar Rol');
	 $("#modal_rol").modal();
	}


//Boton Accion
$('.btnaction').click(function () {
	 var btnid=this.id;
    Rol.rol_form.data('bootstrapValidator').validate();
        if(Rol.rol_form.data('bootstrapValidator').isValid())
			{
       		var rol={};
       		rol.rol=$("#rol").val();
       			var url=urlhome+"seguridad/rol/create";
					var title="Insertando elemento...";
        	if($('#taskrol').val()=="update")
        		{
            		var url=urlhome+"seguridad/rol/update";
					title="Actualizando elemento...";
					$('#btnaction_rol_new').hide();
            		rol.idrol=Rol.oldElement.idrol;
        		
        		}
        		Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', title,'center');
        		if(btnid.indexOf('new')!=-1 && $('#taskrol').val() != 'update')
         $.ajax({
            type: "POST",
            url:url,
            data:{
            Rol:rol,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El rol fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Rol.gridDataSource.read();
                    $.noty.closeAll();
				 resetrolForm();            },
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
            Rol:rol,
            _onto_CSRF:_csrf
            },
            success:function(response){
                if(response.success)
                {
                    var message='El elemento fue insertado con exito'
                    var accion='insertado';
                    if($('#taskrol').val()=='update') {
                        message = 'El elemento fue actualizado con exito'
                        accion='actualizado';

                    }
                    Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El rol fue '+accion+' correctamente', message,'topRight');
                }
                else
                {
                    var message='Error en insercion'
                    if($('#taskrol').val()=='update')
                        message='Error en actualizacion'
                     Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                }
                Rol.gridDataSource.read();
                    $.noty.closeAll();
                $("#modal_rol").modal('hide');
            },
            error:function(response){
               if(response)
                {
                     Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
                }
                    $.noty.closeAll();
                $("#modal_rol").modal('hide');
            }
        });

	}
});

//Eliminar elemento
				function delete_element_rol(e)
				{
				    var dataItem=Rol.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Rol?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/seguridad/rol/delete",
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
				                    Rol.gridDataSource.read();
                        			$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Rol.gridDataSource.read();
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
	$('#deletebutton_rol').click(function()
	 {
	  var checkbox_checked=$('#gridselection_rol .check_row:checked');
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Rol.finditem($(this).attr('id'));
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
				                url:urlhome+"/seguridad/rol/delete",
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
				                    Rol.gridDataSource.read();
				                	$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Rol.gridDataSource.read();
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
	$("#excel_rol").click(function() {
				var list='';
				var filters =  Rol.gridDataSource.filter();
				if(filters) {
					var allData = Rol.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Rol.gridDataSource.data();
				$('#rol_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#pdf_rol").click(function() {
    $('#list_rol_pdf').modal();
    $("#tbody_table_rol").html('');
    var list='';
    var filters =  Rol.gridDataSource.filter();
    if(filters) {
        var allData = Rol.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Rol.gridDataSource.data();
    list.forEach(Rol.list_pdf);
});

$("#export_rol_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_rol").html('');
    		    var list='';
    		    var filters =  Rol.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Rol.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Rol.gridDataSource.data();
    		    list.forEach(Rol.list_pdf);
		    kendo.drawing.drawDOM($("#table_rol_pdf"))
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
		            $('#list_rol_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Rol_Report_PDF.pdf",
		                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
		            });
		        });
		});

$("#excel_rol_importar").click(function() {
	$('#import_rol').modal();
});


$("#importar_rol_excel").click(function() {
		if(Rol.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"seguridad/rol/load_excel";
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
									Rol.gridDataSource.read();
									$('#import_rol').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_rol').click(function () {
    var c = this.checked;
    $('#gridselection_rol :checkbox').prop('checked',c);
});

function resetrolForm() {
		Rol.rol_form.data('bootstrapValidator').resetForm(true);
 }

