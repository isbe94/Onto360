/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/


function setsubmitbtn(e) {
    $('#btnsubmit').val(e.id);
    return true;
}

$("#text-search-lenguaje").keyup(function (event) {
    var q = $("#text-search-lenguaje").val();
    var grid = $("#gridselection_lenguaje").data("kendoGrid");
    grid.dataSource.query({
        page: 1,
        pageSize: 20,
        filter: {
            logic: "or",
            filters: [

                {field: "lenguaje", operator: "contains", value: q}

            ]
        }
    });
});
$("#clear-filter-lenguaje").click(function (event) {
    event.preventDefault();
    var datasource = $("#gridselection_lenguaje").data("kendoGrid").dataSource;
    //Clear filters:
    datasource.filter([]);
    $("#text-search-lenguaje").val('')
});


$("#btn_modal_lenguaje").click(function () {
    Lenguaje.oldElement = null;
    $('#idlenguaje').val('-1');
    Lenguaje.lenguaje_form.data('bootstrapValidator').resetForm(true);
    $('#lenguaje_form')[0].reset();
    $('#btnaction_lenguaje').html('Guardar');
    $("#title_lenguaje").html('Insertar Lenguaje');
    $("#tasklenguaje").val('insert');
    $('#btnaction_lenguaje_new').show();
    $("#modal_lenguaje").modal();
});

$("#reload_lenguaje").click(function () {
    if ($('#tasklenguaje').val() != 'update') {
        resetlenguajeForm();
    }
    else {
        Lenguaje.lenguaje_form.data('bootstrapValidator').resetForm(true);
        $("#lenguaje").val($.trim(Lenguaje.oldElement.lenguaje));
        $('#idlenguaje').val(lenguaje.oldElement.idlenguaje);
        $("#tasklenguaje").val('update');
        Lenguaje.lenguaje_form.data('bootstrapValidator').validate();
    }
});

function showUpdate_lenguaje(e) {

    Lenguaje.lenguaje_form.data('bootstrapValidator').resetForm(true);
    var dataItem = Lenguaje.finditem(e.id);
    Lenguaje.oldElement = dataItem;
    $('#idlenguaje').val(dataItem.idlenguaje);
    $("#lenguaje").val($.trim(Lenguaje.oldElement.lenguaje));
    $("#tasklenguaje").val('update');
    $('#btnaction_lenguaje_new').hide();
    $('#btnaction_lenguaje').html('Actualizar');
    $("#title_lenguaje").html('Actualizar Lenguaje');
    $("#modal_lenguaje").modal();
}


//Boton Accion
$('.btnaction').click(function () {
    var btnid = this.id;
    Lenguaje.lenguaje_form.data('bootstrapValidator').validate();
    if (Lenguaje.lenguaje_form.data('bootstrapValidator').isValid()) {
        var lenguaje = {};
        lenguaje.lenguaje = $("#lenguaje").val();
        var url = urlhome + "gestion/lenguaje/create";
        var title = "Insertando elemento...";
        if ($('#tasklenguaje').val() == "update") {
            var url = urlhome + "gestion/lenguaje/update";
            title = "Actualizando elemento...";
            $('#btnaction_lenguaje_new').hide();
            lenguaje.idlenguaje = Lenguaje.oldElement.idlenguaje;

        }
        if (btnid.indexOf('new') != -1 && $('#tasklenguaje').val() != 'update')
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    Lenguaje: lenguaje,
                    _onto_CSRF: _csrf
                },
                success: function (response) {
                    if (response.success) {
                        var message = 'El elemento fue insertado con exito'
                        var accion = 'insertado';
                        Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', 'El Lenguaje fue ' + accion + ' correctamente', message, 'topRight');
                    }
                    else {
                        var message = 'Error en insercion'
                        Noty('#D91E18', 'error', 2000, 'fa fa-ban', message, response.message, 'topRight');
                    }
                    Lenguaje.gridDataSource.read();
                    $.noty.closeAll();
                    resetlenguajeForm();
                },
                error: function (response) {
                    if (response) {
                        Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en accion', response.message, 'topRight');
                    }
                    $.noty.closeAll();
                }
            });
        else
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    Lenguaje: lenguaje,
                    _onto_CSRF: _csrf
                },
                success: function (response) {
                    if (response.success) {
                        var message = 'El elemento fue insertado con exito'
                        var accion = 'insertado';
                        if ($('#tasklenguaje').val() == 'update') {
                            message = 'El elemento fue actualizado con exito'
                            accion = 'actualizado';

                        }
                        Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', 'El Lenguaje fue ' + accion + ' correctamente', message, 'topRight');
                    }
                    else {
                        var message = 'Error en insercion'
                        if ($('#tasklenguaje').val() == 'update')
                            message = 'Error en actualizacion'
                        Noty('#D91E18', 'error', 2000, 'fa fa-ban', message, response.message, 'topRight');
                    }
                    Lenguaje.gridDataSource.read();
                    $.noty.closeAll();
                    $("#modal_lenguaje").modal('hide');
                },
                error: function (response) {
                    if (response) {
                        Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en accion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n', 'topRight');
                    }
                    $.noty.closeAll();
                    $("#modal_lenguaje").modal('hide');
                }
            });

    }
});

//Eliminar elemento
function delete_element_lenguaje(e) {
    var dataItem = Lenguaje.finditem(e.id);
    var array = [];
    array.push(dataItem);
    $.MetroMessageBox({
            title: "<span class='fa fa-trash-o'></span> Eliminar ",
            content: "<p class='fg-white'>Desea eliminar este Lenguaje?</p> ",
            NormalButton: "#232323",
            ActiveButton: "#008a00 ",
            buttons: " [Cancelar][Aceptar]"
        }, function (a) {
            if (a == "Aceptar") {
                $.ajax({
                    type: "POST",
                    url: urlhome + "/gestion/lenguaje/delete",
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
                        Lenguaje.gridDataSource.read();
                        $.noty.closeAll();
                    },
                    error: function (response) {
                        if (response) {
                            Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n', 'topRight');
                        }
                        Lenguaje.gridDataSource.read();
                        $.noty.closeAll();
                    }
                });
                $.noty.closeAll();
            }
            else {
                $.noty.closeAll();
            }
        }
    )
}

//Eliminar elemento
$('#deletebutton_lenguaje').click(function () {
    var checkbox_checked = $('#gridselection_lenguaje .check_row:checked');

    if (checkbox_checked.length == 0) {

        Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar', 'topRight')
        return false;
    }
    var array = [];
    checkbox_checked.each(function () {
            var dataItem = Lenguaje.finditem($(this).attr('id'));
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
               
                $.ajax({
                    type: "POST",
                    url: urlhome + "/gestion/lenguaje/delete",
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
                        Lenguaje.gridDataSource.read();
                        $.noty.closeAll();
                    },
                    error: function (response) {
                        if (response) {
                            Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n', 'topRight');
                        }
                        Lenguaje.gridDataSource.read();
                        $.noty.closeAll();
                    }
                });
                $.noty.closeAll();
            }
            else {
                $.noty.closeAll();
            }
        }
    )
});
$("#excel_lenguaje").click(function () {
    var list = '';
    var filters = Lenguaje.gridDataSource.filter();
    if (filters) {
        var allData = Lenguaje.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Lenguaje.gridDataSource.data();
    $('#lenguaje_export').val(JSON.stringify(list));
    $('#form_excel_export').submit();
});

$("#pdf_lenguaje").click(function () {
    $('#list_lenguaje_pdf').modal();
    $("#tbody_table_lenguaje").html('');
    var list = '';
    var filters = Lenguaje.gridDataSource.filter();
    if (filters) {
        var allData = Lenguaje.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Lenguaje.gridDataSource.data();
    list.forEach(Lenguaje.list_pdf);
});

$("#export_lenguaje_pdf").click(function () {
    $('body').modalmanager('loading');
    $("#tbody_table_lenguaje").html('');
    var list = '';
    var filters = Lenguaje.gridDataSource.filter();
    if (filters) {
        var allData = Lenguaje.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Lenguaje.gridDataSource.data();
    list.forEach(Lenguaje.list_pdf);
    kendo.drawing.drawDOM($("#table_lenguaje_pdf"))
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
            $('#list_lenguaje_pdf').modal('hide');
            kendo.saveAs({
                dataURI: data,
                fileName: "Lenguaje_Report_PDF.pdf"
            });
        });
});

$("#excel_lenguaje_importar").click(function () {
    $('#import_lenguaje').modal();
});


$("#importar_lenguaje_excel").click(function () {
    if (Lenguaje.importarbootstrapValidator.isValid()) {
        var data = new FormData();
        var excel = $('#importar_excel')[0].files[0];
        data.append('excel', excel);
        data.append('_onto_CSRF', _csrf);
        var url = urlhome + "gestion/lenguaje/load_excel";
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
                    Lenguaje.gridDataSource.read();
                    $('#import_lenguaje').modal('hide');
                    Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', "Importacion de elementos", 'Los Elementos fueron importados con exito', 'topRight');
                }

            }
        });
    }
});

//Para chequear todos los elementos
$('#all_check_lenguaje').click(function () {
    var c = this.checked;
    $('#gridselection_lenguaje :checkbox').prop('checked', c);
});

function resetlenguajeForm() {
    Lenguaje.lenguaje_form.data('bootstrapValidator').resetForm(true);
}

