/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/


function setsubmitbtn(e) {
    $('#btnsubmit').val(e.id);
    return true;
}

$("#text-search-tecnologia").keyup(function (event) {
    var q = $("#text-search-tecnologia").val();
    var grid = $("#gridselection_tecnologia").data("kendoGrid");
    grid.dataSource.query({
        page: 1,
        pageSize: 20,
        filter: {
            logic: "or",
            filters: [

                {field: "tecnologia", operator: "contains", value: q},

                {field: "direccion", operator: "contains", value: q}

            ]
        }
    });
});
$("#clear-filter-tecnologia").click(function (event) {
    event.preventDefault();
    var datasource = $("#gridselection_tecnologia").data("kendoGrid").dataSource;
    //Clear filters:
    datasource.filter([]);
    $("#text-search-tecnologia").val('')
});


$("#btn_modal_tecnologia").click(function () {
    Tecnologia.oldElement = null;
    $('#idtecnologia').val('-1');
    Tecnologia.tecnologia_form.data('bootstrapValidator').resetForm(true);
    $('#tecnologia_form')[0].reset();
    $('#btnaction_tecnologia').html('Guardar');
    $("#title_tecnologia").html('Insertar Tecnologia');
    $("#tasktecnologia").val('insert');
    $('#btnaction_tecnologia_new').show();
    $("#modal_tecnologia").modal();
});

$("#reload_tecnologia").click(function () {
    if ($('#tasktecnologia').val() != 'update') {
        resettecnologiaForm();
    }
    else {
        Tecnologia.tecnologia_form.data('bootstrapValidator').resetForm(true);
        $("#tecnologia").val($.trim(Tecnologia.oldElement.tecnologia));
        $("#direccion").val($.trim(Tecnologia.oldElement.direccion));
        $('#idtecnologia').val(tecnologia.oldElement.idtecnologia);
        $("#tasktecnologia").val('update');
        Tecnologia.tecnologia_form.data('bootstrapValidator').validate();
    }
});

function showUpdate_tecnologia(e) {

    Tecnologia.tecnologia_form.data('bootstrapValidator').resetForm(true);
    var dataItem = Tecnologia.finditem(e.id);
    Tecnologia.oldElement = dataItem;
    $('#idtecnologia').val(dataItem.idtecnologia);
    $("#tecnologia").val($.trim(Tecnologia.oldElement.tecnologia));
    $("#direccion").val($.trim(Tecnologia.oldElement.direccion));
    $("#tasktecnologia").val('update');
    $('#btnaction_tecnologia_new').hide();
    $('#btnaction_tecnologia').html('Actualizar');
    $("#title_tecnologia").html('Actualizar Tecnologia');
    $("#modal_tecnologia").modal();
}


//Boton Accion
$('.btnaction').click(function () {
    var btnid = this.id;
    Tecnologia.tecnologia_form.data('bootstrapValidator').validate();
    if (Tecnologia.tecnologia_form.data('bootstrapValidator').isValid()) {
        var tecnologia = {};
        tecnologia.tecnologia = $("#tecnologia").val();
        tecnologia.direccion = $("#direccion").val();
        var url = urlhome + "gestion/tecnologia/create";
        var title = "Insertando elemento...";
        if ($('#tasktecnologia').val() == "update") {
            var url = urlhome + "gestion/tecnologia/update";
            title = "Actualizando elemento...";
            $('#btnaction_tecnologia_new').hide();
            tecnologia.idtecnologia = Tecnologia.oldElement.idtecnologia;

        }
        if (btnid.indexOf('new') != -1 && $('#tasktecnologia').val() != 'update')
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    Tecnologia: tecnologia,
                    _onto_CSRF: _csrf
                },
                success: function (response) {
                    if (response.success) {
                        var message = 'El elemento fue insertado con exito'
                        var accion = 'insertado';
                        Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', 'El tecnologia fue ' + accion + ' correctamente', message, 'topRight');
                    }
                    else {
                        var message = 'Error en insercion'
                        Noty('#D91E18', 'error', 2000, 'fa fa-ban', message, response.message, 'topRight');
                    }
                    Tecnologia.gridDataSource.read();
                    $.noty.closeAll();
                    resettecnologiaForm();
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
                    Tecnologia: tecnologia,
                    _onto_CSRF: _csrf
                },
                success: function (response) {
                    if (response.success) {
                        var message = 'El elemento fue insertado con exito'
                        var accion = 'insertado';
                        if ($('#tasktecnologia').val() == 'update') {
                            message = 'El elemento fue actualizado con exito'
                            accion = 'actualizado';

                        }
                        Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', 'El tecnologia fue ' + accion + ' correctamente', message, 'topRight');
                    }
                    else {
                        var message = 'Error en insercion'
                        if ($('#tasktecnologia').val() == 'update')
                            message = 'Error en actualizacion'
                        Noty('#D91E18', 'error', 2000, 'fa fa-ban', message, response.message, 'topRight');
                    }
                    Tecnologia.gridDataSource.read();
                    $.noty.closeAll();
                    $("#modal_tecnologia").modal('hide');
                },
                error: function (response) {
                    if (response) {
                        Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en accion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n', 'topRight');
                    }
                    $.noty.closeAll();
                    $("#modal_tecnologia").modal('hide');
                }
            });

    }
});

//Eliminar elemento
function delete_element_tecnologia(e) {
    var dataItem = Tecnologia.finditem(e.id);
    var array = [];
    array.push(dataItem);
    $.MetroMessageBox({
            title: "<span class='fa fa-trash-o'></span> Eliminar ",
            content: "<p class='fg-white'>Desea eliminar este Tecnologia?</p> ",
            NormalButton: "#232323",
            ActiveButton: "#008a00 ",
            buttons: " [Cancelar][Aceptar]"
        }, function (a) {
            if (a == "Aceptar") {
                $.ajax({
                    type: "POST",
                    url: urlhome + "/gestion/tecnologia/delete",
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
                        Tecnologia.gridDataSource.read();
                        $.noty.closeAll();
                    },
                    error: function (response) {
                        if (response) {
                            Noty('#D91E18', 'error', 2000, 'fa fa-ban', 'Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n', 'topRight');
                        }
                        Tecnologia.gridDataSource.read();
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
$('#deletebutton_tecnologia').click(function()
{
    var checkbox_checked=$('#gridselection_tecnologia .check_row:checked');

    if(checkbox_checked.length==0)
    {

        Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminaci�n', 'Debe seleccionar al menos un elemento a eliminar','topRight')
        return false;
    }
    var array=[];
    checkbox_checked.each(function(){
            var dataItem=Tecnologia.finditem($(this).attr('id'));
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

                $.ajax({
                    type: "POST",
                    url:urlhome+"/gestion/tecnologia/delete",
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
                        Tecnologia.gridDataSource.read();
                        $.noty.closeAll();

                    },
                    error:function(response){
                        if(response)
                        {
                            Noty('#D91E18','error',2000,'fa fa-ban','Error en eliminacion', 'El registro est� relacionado con otro registro,Imposible su eliminaci�n','topRight');
                        }
                        Tecnologia.gridDataSource.read();
                        $.noty.closeAll();

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

$("#excel_tecnologia").click(function () {
    var list = '';
    var filters = Tecnologia.gridDataSource.filter();
    if (filters) {
        var allData = Tecnologia.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Tecnologia.gridDataSource.data();
    $('#tecnologia_export').val(JSON.stringify(list));
    $('#form_excel_export').submit();
});

$("#pdf_tecnologia").click(function () {
    $('#list_tecnologia_pdf').modal();
    $("#tbody_table_tecnologia").html('');
    var list = '';
    var filters = Tecnologia.gridDataSource.filter();
    if (filters) {
        var allData = Tecnologia.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Tecnologia.gridDataSource.data();
    list.forEach(Tecnologia.list_pdf);
});

$("#export_tecnologia_pdf").click(function () {
    $('body').modalmanager('loading');
    $("#tbody_table_tecnologia").html('');
    var list = '';
    var filters = Tecnologia.gridDataSource.filter();
    if (filters) {
        var allData = Tecnologia.gridDataSource.data();
        var query = new kendo.data.Query(allData);
        list = query.filter(filters).data;
    }
    else
        list = Tecnologia.gridDataSource.data();
    list.forEach(Tecnologia.list_pdf);
    kendo.drawing.drawDOM($("#table_tecnologia_pdf"))
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
            $('#list_tecnologia_pdf').modal('hide');
            kendo.saveAs({
                dataURI: data,
                fileName: "Tecnologia_Report_PDF.pdf"
            });
        });
});

$("#excel_tecnologia_importar").click(function () {
    $('#import_tecnologia').modal();
});


$("#importar_tecnologia_excel").click(function () {
    if (Tecnologia.importarbootstrapValidator.isValid()) {
        var data = new FormData();
        var excel = $('#importar_excel')[0].files[0];
        data.append('excel', excel);
        data.append('_onto_CSRF', _csrf);
        var url = urlhome + "gestion/tecnologia/load_excel";
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
                    Tecnologia.gridDataSource.read();
                    $('#import_tecnologia').modal('hide');
                    Noty('#2D8F3C', 'success', 2000, 'fa fa-thumbs-o-up', "Importacion de elementos", 'Los Elementos fueron importados con exito', 'topRight');
                }

            }
        });
    }
});

//Para chequear todos los elementos
$('#all_check_tecnologia').click(function () {
    var c = this.checked;
    $('#gridselection_tecnologia :checkbox').prop('checked', c);
});

function resettecnologiaForm() {
    Tecnologia.tecnologia_form.data('bootstrapValidator').resetForm(true);
}

