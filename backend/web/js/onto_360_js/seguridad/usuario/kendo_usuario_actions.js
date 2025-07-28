/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/




function setsubmitbtn(e){
    $('#btnsubmit').val(e.id);
    return true;
}


		$("#text-search-usuario").keyup(function (event) {
		    var q = $("#text-search-usuario").val();
		    var grid = $("#gridselection_usuario").data("kendoGrid");
		    grid.dataSource.query({
		        page: 1,
		        pageSize: 20,
		        filter: {
		            logic: "or",
		            filters: [

		                {field: "usuario", operator: "contains", value: q},

		                {field: "nombre", operator: "contains", value: q},

		                {field: "contrasena", operator: "contains", value: q},

		                {field: "auth_key", operator: "contains", value: q},

		                {field: "avatar", operator: "contains", value: q},

		                {field: "apellido1", operator: "contains", value: q},

		                {field: "apellido2", operator: "contains", value: q},

		                {field: "correo", operator: "contains", value: q},

		                {field: "rol", operator: "contains", value: q},

		                {field: "categcient", operator: "contains", value: q},

		                {field: "grado_experiencia", operator: "contains", value: q}

		            ]
		        }
		    });
		});
		$("#clear-filter-usuario").click(function (event) {
		    event.preventDefault();
		    var datasource = $("#gridselection_usuario").data("kendoGrid").dataSource;
		    //Clear filters:
		    datasource.filter([]);
		    $("#text-search-usuario").val('')
		});
		

$("#reload_usuario").click(function() {
	if($('#taskusuario').val()!='update') {
		resetusuarioForm();
	}
	else {
		Usuario.usuario_form.data('bootstrapValidator').resetForm(true);
	 	$("#usuario").val($.trim(Usuario.oldElement.usuario));
	 	$("#nombre").val($.trim(Usuario.oldElement.nombre));
	 	$("#contrasena").val($.trim(Usuario.oldElement.contrasena));
	 	$("#auth_key").val($.trim(Usuario.oldElement.auth_key));
	 	$("#created_at").val($.trim(Usuario.oldElement.created_at));
	 	$("#updated_at").val($.trim(Usuario.oldElement.updated_at));
	 	$("#avatar").val($.trim(Usuario.oldElement.avatar));
	 	$("#apellido1").val($.trim(Usuario.oldElement.apellido1));
	 	$("#apellido2").val($.trim(Usuario.oldElement.apellido2));
	 	$("#activo").val($.trim(Usuario.oldElement.activo));
	 	$("#experto").val($.trim(Usuario.oldElement.experto));
	 	$("#correo").val($.trim(Usuario.oldElement.correo));
	 	Usuario.combobox_rol.append('<option selected="" value="'+Usuario.oldElement.id_rol+'">'+Usuario.oldElement.rol+'</option>').change();
	 	Usuario.combobox_rol.val(Usuario.oldElement.id_rol);
	 	Usuario.combobox_categoriacientifica.append('<option selected="" value="'+Usuario.oldElement.id_catcientifica+'">'+Usuario.oldElement.categcient+'</option>').change();
	 	Usuario.combobox_categoriacientifica.val(Usuario.oldElement.id_catcientifica);
	 	Usuario.combobox_experticia.append('<option selected="" value="'+Usuario.oldElement.id_experticia+'">'+Usuario.oldElement.grado_experiencia+'</option>').change();
	 	Usuario.combobox_experticia.val(Usuario.oldElement.id_experticia);
	 	$('#idusuario').val(usuario.oldElement.idusuario);
	 	$("#taskusuario").val('update');
		Usuario.usuario_form.data('bootstrapValidator').validate();
	}
});

$("#pdf_usuario").click(function() {
    $('#list_usuario_pdf').modal();
    $("#tbody_table_usuario").html('');
    var list='';
    var filters =  Usuario.gridDataSource.filter();
    if(filters) {
        var allData = Usuario.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list= Usuario.gridDataSource.data();
    list.forEach(Usuario.list_pdf);
});

	$("#excel_usuario").click(function() {
				var list='';
				var filters =  Usuario.gridDataSource.filter();
				if(filters) {
					var allData = Usuario.gridDataSource.data();
					var query = new kendo.data.Query(allData);
					list = query.filter(filters).data;
				}
				else
					list= Usuario.gridDataSource.data();
				$('#usuario_export').val(JSON.stringify(list));
				$('#form_excel_export').submit();
		});

$("#export_usuario_pdf").click(function() {
		    $('body').modalmanager('loading');
    		    $("#tbody_table_usuario").html('');
    		    var list='';
    		    var filters =  Usuario.gridDataSource.filter();
    		    if(filters) {
        		    var allData = Usuario.gridDataSource.data();
        		    var query = new kendo.data.Query(allData);
        		    list = query.filter(filters).data;
    		    }
    		    else
        		    list= Usuario.gridDataSource.data();
    		    list.forEach(Usuario.list_pdf);
		    kendo.drawing.drawDOM($("#table_usuario_pdf"))
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
		            $('#list_usuario_pdf').modal('hide');
		            kendo.saveAs({
		                dataURI: data,
		                fileName: "Usuario_Report_PDF.pdf",
		                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
		            });
		        });
		});

$("#excel_usuario_importar").click(function() {
	$('#import_usuario').modal();
});


$("#importar_usuario_excel").click(function() {
		if(Usuario.importarbootstrapValidator.isValid())
					{
						var data= new FormData();
						var excel= $('#importar_excel')[0].files[0];
						data.append('excel',excel);
						data.append('_onto_CSRF',_csrf);
						var url=urlhome+"seguridad/usuario/load_excel";
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
									Usuario.gridDataSource.read();
									$('#import_usuario').modal('hide');
											Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up',"Importacion de elementos", 'Los Elementos fueron importados con exito','topRight');
								}

							}
						});
					}
		});

//Para chequear todos los elementos
$('#all_check_usuario').click(function () {
    var c = this.checked;
    $('#gridselection_usuario :checkbox').prop('checked',c);
});

//Eliminar elemento
				function delete_element_usuario(e)
				{
				    var dataItem=Usuario.finditem(e.id);
		    		var array=[];
				    array.push(dataItem);
				    $.MetroMessageBox({
				        title: "<span class='fa fa-trash-o'></span> Eliminar ",
				        content: "<p class='fg-white'>Desea eliminar este Usuario?</p> ",
				        NormalButton: "#232323",
			        	ActiveButton: "#008a00 ",
				        buttons: " [Cancelar][Aceptar]"
				    }, function (a) {
				        if(a=="Aceptar")
				        {
							Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
				            $.ajax({
				                type: "POST",
				                url:urlhome+"/seguridad/usuario/delete",
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
				                    Usuario.gridDataSource.read();
                        			$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Usuario.gridDataSource.read();
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
	$('#deletebutton_usuario').click(function()
	 {
	  var checkbox_checked=$('#gridselection_usuario .check_row:checked');
	  if(checkbox_checked.length==0)
        {

            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
			 return false;
		  }
		    		var array=[];
					checkbox_checked.each(function(){
                      		var dataItem=Usuario.finditem($(this).attr('id'));
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
				                url:urlhome+"/seguridad/usuario/delete",
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
				                    Usuario.gridDataSource.read();
				                	$.noty.closeAll();
				                },
				                error:function(response){
				                    if(response)
				                    {
				                        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
				                    }
				                    Usuario.gridDataSource.read();
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
