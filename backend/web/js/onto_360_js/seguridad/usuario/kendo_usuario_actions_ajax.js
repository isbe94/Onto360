/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


function setsubmitbtn(e) {
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


$("#btn_modal_usuario").click(function () {
    Usuario.oldElement = null;
    $('#select2-id_rol-container').html('');
    Usuario.combobox_rol.append('<option selected="" value=""></option>').change();
    $('#select2-id_catcientifica-container').html('');
    Usuario.combobox_categoriacientifica.append('<option selected="" value=""></option>').change();
    $('#select2-id_experticia-container').html('');
    Usuario.combobox_experticia.append('<option selected="" value=""></option>').change();
    $('#idusuario').val('-1');
    Usuario.usuario_form.data('bootstrapValidator').resetForm(true);
    $('#usuario_form')[0].reset();
    $('#activo').iCheck('uncheck');
    $('#btnaction_usuario').html('Guardar');
    $("#title_usuario").html('Insertar Usuario');
    $("#taskusuario").val('insert');
    $('#btnaction_usuario_new').show();
    $('#select2-id_rol_combo-container').html('');
    $('#select2-id_catcientifica_combo-container').html('');
    $('#select2-id_experticia_combo-container').html('');
    $("#modal_usuario").modal();
});


function showUpdate_usuario(e) {

    Usuario.usuario_form.data('bootstrapValidator').resetForm(true);
    var dataItem = Usuario.finditem(e.id);
    Usuario.oldElement = dataItem;
    $('#idusuario').val(dataItem.idusuario);
    $("#usuario").val($.trim(Usuario.oldElement.usuario));
    $("#nombre").val($.trim(Usuario.oldElement.nombre));
    $("#contrasena").val($.trim(Usuario.oldElement.contrasena));
    $("#avatar").attr("src", urlhome + "/images/usuarios/" + Usuario.oldElement.avatar);
    $("#apellido1").val($.trim(Usuario.oldElement.apellido1));
    $("#apellido2").val($.trim(Usuario.oldElement.apellido2));
    $('#activo').iCheck('uncheck');

    if(Usuario.oldElement.activo==1)
    {
        $('#activo').iCheck('check');

    }
    $("#experto").val($.trim(Usuario.oldElement.experto));
    $("#correo").val($.trim(Usuario.oldElement.correo));
    Usuario.combobox_rol.append('<option selected="" value="' + Usuario.oldElement.id_rol + '">' + Usuario.oldElement.rol + '</option>').change();
    Usuario.combobox_rol.val(Usuario.oldElement.id_rol);
    Usuario.combobox_categoriacientifica.append('<option selected="" value="' + Usuario.oldElement.id_catcientifica + '">' + Usuario.oldElement.categcient + '</option>').change();
    Usuario.combobox_categoriacientifica.val(Usuario.oldElement.id_catcientifica);
    Usuario.combobox_experticia.append('<option selected="" value="' + Usuario.oldElement.id_experticia + '">' + Usuario.oldElement.grado_experiencia + '</option>').change();
    Usuario.combobox_experticia.val(Usuario.oldElement.id_experticia);
    $("#taskusuario").val('update');
    $('#btnaction_usuario_new').hide();
    $('#btnaction_usuario').html('Actualizar');
    $("#title_usuario").html('Actualizar Usuario');
    $("#modal_usuario").modal();
}


//Boton Accion
$('.btnaction').click(function () {
    var btnid = this.id;
    Usuario.usuario_form.data('bootstrapValidator').validate();
    if (Usuario.usuario_form.data('bootstrapValidator').isValid()) {
        var data = new FormData();
        var usuario = {};
        usuario.usuario = $("#usuario").val();
        usuario.nombre = $("#nombre").val();
        usuario.contrasena = $("#contrasena").val();
        usuario.avatar = $("#foto").val();
        usuario.apellido1 = $("#apellido1").val();
        usuario.apellido2 = $("#apellido2").val();
        usuario.activo =0 ;
        if($("#activo").prop('checked'))
        usuario.activo =1;
        usuario.correo = $("#correo").val();
        usuario.id_rol = Usuario.combobox_rol.val();
        usuario.id_catcientifica = Usuario.combobox_categoriacientifica.val();
        usuario.id_experticia = Usuario.combobox_experticia.val();
        var url = urlhome + "seguridad/usuario/create";
        var title = "Insertando elemento...";
        if ($('#taskusuario').val() == "update") {
            var url = urlhome + "seguridad/usuario/update";
            title = "Actualizando elemento...";
            $('#btnaction_usuario_new').hide();
            usuario.avatar = Usuario.oldElement.avatar;
            usuario.idusuario = Usuario.oldElement.idusuario;

        }
        data.append('Usuario', JSON.stringify(usuario));
        data.append('_onto_CSRF', _csrf);
        var foto = $('#foto')[0].files[0];
        data.append('avatar', foto);
        
        Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', title, 'center');
        if (btnid.indexOf('new') != -1 && $('#taskusuario').val() != 'update')
            $.ajax({
                type: "POST",
                url:url,
                contentType: false, //Debe estar en false para que pase el objeto sin procesar
                processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
                cache: false, //Para que el formulario no guarde cache
                data:data,
                success:function(response){
                    if(response.success)
                    {
                        var message='El elemento fue insertado con exito'
                        var accion='insertado';
                        Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El usuario fue '+accion+' correctamente', message,'topRight');
                    }
                    else
                    {
                        var message='Error en insercion'
                        Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                    }
                    Usuario.gridDataSource.read();
                    $.noty.closeAll();
                    resetusuarioForm();            
                },
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
                contentType: false, //Debe estar en false para que pase el objeto sin procesar
                processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
                cache: false, //Para que el formulario no guarde cache
                data:data,
                success:function(response){
                    if(response.success)
                    {
                        var message='El elemento fue insertado con exito'
                        var accion='insertado';
                        if($('#taskusuario').val()=='update') {
                            message = 'El elemento fue actualizado con exito'
                            accion='actualizado';
                            
                        }
                        Noty('#2D8F3C','success',2000,'fa fa-thumbs-o-up','El usuario fue '+accion+' correctamente', message,'topRight');
                    }
                    else
                    {
                        var message='Error en insercion'
                        if($('#taskusuario').val()=='update')
                            message='Error en actualizacion'
                        Noty('#D91E18','error',2000,'fa fa-ban',message,response.message,'topRight');
                    }
                    Usuario.gridDataSource.read();
                    $.noty.closeAll();
                    $("#modal_usuario").modal('hide');
                },
                error:function(response){
                    if(response)
                    {
                        Noty('#D91E18','error',2000,'fa fa-ban','Error en accion','El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
                    }
                    $.noty.closeAll();
                    $("#modal_usuario").modal('hide');
                }
            });

    }
});

//Eliminar elemento
function delete_element_usuario(e) {
    var dataItem = Usuario.finditem(e.id);
    var array = [];
    array.push(dataItem);
    $.MetroMessageBox({
            title: "<span class='fa fa-trash-o'></span> Eliminar ",
            content: "<p class='fg-white'>Desea eliminar este Usuario?</p> ",
            NormalButton: "#232323",
            ActiveButton: "#008a00 ",
            buttons: " [Cancelar][Aceptar]"
        }, function (a) {
            if (a == "Aceptar") {
                Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elemento', 'center');
                $.ajax({
                    type: "POST",
                    url: urlhome + "/seguridad/usuario/delete",
                    data: {
                        array: JSON.stringify(array),
                        _onto_CSRF: _csrf
                    },
                    success: function (response) {
                        if (response.success == true) {
                            Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', 'Elemento eliminado correctamente', 'El elemento fue eliminado correctamente', 'topRight');
                        }
                        else {
                            Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminacion', response.message, 'topRight');
                        }
                        Usuario.gridDataSource.read();
                        $.noty.closeAll();
                    },
                    error: function (response) {
                        if (response) {
                            Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n', 'topRight');
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
$('#deletebutton_usuario').click(function () {
    var checkbox_checked = $('#gridselection_usuario .check_row:checked');
    if (checkbox_checked.length == 0) {

        Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar', 'topRight')
        return false;
    }
    var array = [];
    checkbox_checked.each(function () {
            var dataItem = Usuario.finditem($(this).attr('id'));
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
            if (a == "Aceptar") {
                Noty('#2D8F3C', 'success', false, 'fa fa-spinner faa-spin animated', '', 'Eliminando Elementos', 'center');
                $.ajax({
                    type: "POST",
                    url: urlhome + "/seguridad/usuario/delete",
                    data: {
                        array: JSON.stringify(array),
                        _onto_CSRF: _csrf
                    },
                    success: function (response) {
                        if (response.success == true) {
                            Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', 'Elemento eliminado', 'Elemento eliminado correctamente', 'topRight');
                        }
                        else {
                            Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminacion', response.message, 'topRight');
                        }
                        Usuario.gridDataSource.read();
                        $.noty.closeAll();
                    },
                    error: function (response) {
                        if (response) {
                            Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n', 'topRight');
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
$("#excel_usuario").click(function () {
    var list = '';
    var filters = Usuario.gridDataSource.filter();
    if (filters) {
        var allData = Usuario.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Usuario.gridDataSource.data();
    $('#usuario_export').val(JSON.stringify(list));
    $('#form_excel_export').submit();
});

$("#pdf_usuario").click(function () {
    $('#list_usuario_pdf').modal();
    $("#tbody_table_usuario").html('');
    var list = '';
    var filters = Usuario.gridDataSource.filter();
    if (filters) {
        var allData = Usuario.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Usuario.gridDataSource.data();
    list.forEach(Usuario.list_pdf);
});

$("#export_usuario_pdf").click(function () {
    $('body').modalmanager('loading');
    $("#tbody_table_usuario").html('');
    var list = '';
    var filters = Usuario.gridDataSource.filter();
    if (filters) {
        var allData = Usuario.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Usuario.gridDataSource.data();
    list.forEach(Usuario.list_pdf);
    kendo.drawing.drawDOM($("#table_usuario_pdf"))
        .then(function (group) {
            // Render the result as a PDF file
            return kendo.drawing.exportPDF(group, {
                paperSize: "auto",
                margin: {left: "1cm", top: "1cm", right: "1cm", bottom: "1cm"}
            });
        })
        .done(function (data) {
            // Save the PDF file
            $('body').modalmanager('removeLoading');
            $('#list_usuario_pdf').modal('hide');
            kendo.saveAs({
                dataURI: data,
                fileName: "Usuario_Report_PDF.pdf"
                //proxyURL: "//demos.telerik.com/kendo-ui/service/export"
            });
        });
});

$("#excel_usuario_importar").click(function () {
    $('#import_usuario').modal();
});


$("#importar_usuario_excel").click(function () {
    if (Usuario.importarbootstrapValidator.isValid()) {
        var data = new FormData();
        var excel = $('#importar_excel')[0].files[0];
        data.append('excel', excel);
        data.append('_onto_CSRF', _csrf);
        var url = urlhome + "seguridad/usuario/load_excel";
        $.ajax({
            type: "POST",
            url: url,
            contentType: false, //Debe estar en false para que pase el objeto sin procesar
            data: data, //Le pasamos el objeto que creamos con los archivos
            processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
            cache: false, //Para que el formulario no guarde cache
            success: function (response) {
                var result = jQuery.parseJSON(response);
                if (!result.success) {
                    $('#text-error').html(result.message);
                    $.smallBox({
                        title: '',
                        content: $('#message-error').html(),
                        color: "#BA0916",
                        timeout: 6000
                    })
                }
                else {
                    Usuario.gridDataSource.read();
                    $('#import_usuario').modal('hide');
                    Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', "Importacion de elementos", 'Los Elementos fueron importados con exito', 'topRight');
                }

            }
        });
    }
});

$("#foto").change(function () {
    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
    if (regex.test($(this).val().toLowerCase())) {
        if (false) {
            $("#image_autor")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
        }
        else {
            if ($(this)[0].files[0].size / 1048576 <= 2.097152) {
                if (typeof (FileReader) != "undefined") {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#image_autor").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }

            }
        }
    }
});
//Para chequear todos los elementos
$('#all_check_usuario').click(function () {
    var c = this.checked;
    $('#gridselection_usuario :checkbox').prop('checked', c);
});

function resetusuarioForm() {
    $('#select2-id_rol-container').html('');
    Usuario.combobox_rol.append('<option selected="" value=""></option>').change();
    $('#select2-id_catcientifica-container').html('');
    Usuario.combobox_categoriacientifica.append('<option selected="" value=""></option>').change();
    $('#select2-id_experticia-container').html('');
    Usuario.combobox_experticia.append('<option selected="" value=""></option>').change();
    Usuario.usuario_form.data('bootstrapValidator').resetForm(true);
}

