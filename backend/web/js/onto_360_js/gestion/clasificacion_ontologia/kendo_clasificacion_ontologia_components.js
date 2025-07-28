/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/
var gridclas=null;
var ComponentsClasificacion_ontologia = function () {
    var initForm = function () {
        /*Clasificacion_ontologia Formulario*/
        Clasificacion_ontologia.clasificacion_ontologia_form = $('#clasificacion_ontologia_form');
    };

    var initRead = function () {
        Clasificacion_ontologia.gridDataSource.read();
        Clasificacion.gridDataSource.read();
    };


    var initId_ontologia = function () {
        Clasificacion_ontologia.combobox_ontologia = $("#id_ontologia_combo").select2({
            language: "es",
            ajax: {
                url: urlhome + "gestion/ontologia/list_json",
                dataType: 'json',
                delay: 100,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        combo: true
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.data,
                    };
                },
                cache: true
            }
        });
    };

    var initId_clasificacion = function () {
        Clasificacion_ontologia.combobox_clasificaciones = $("#id_clasificacion_combo").select2({
            language: "es",
            multiple: true,
            ajax: {
                url: urlhome + "nomencladores/clasificacion/list_json",
                dataType: 'json',
                delay: 100,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        combo: true
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.data,
                    };
                },
                cache: true
            }
        });
    };
    


    var initKgridClasificacion_ontologia = function () {
        /*Grid Clasificacion_ontologia*/
        var $kgridclasificacion_ontologia = $("#gridselection_clasificacion_ontologia").kendoGrid({
            dataSource: Clasificacion_ontologia.gridDataSource,
            height: 490,
            filterable: false,
            sortable: true,
            change: Clasificacion_ontologia.change,
            resizable: true,
            detailTemplate: kendo.template($("#template").html()),
            detailInit: detailInit,
            dataBound: Clasificacion_ontologia.dataBound,
            dataBinding: Clasificacion_ontologia.dataBinding,
            pageable: {
                buttonCount: 5,
                refresh: true,
                pageSizes: [2, 10, 20, 30, 50, 100]
            },
            columns: [
                {
                    field: "",
                    title: "",
                    width: '35px',
                    headerTemplate: "<input class='' id='all_check_clasificacion_ontologia' type='checkbox'/>",
                    template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
                }
                ,

                {
                    field: "id_ontologia",
                    title: "Id_ontologia",
                    template: '<div id="item" data-text="#: id_ontologia#">#:id_ontologia#</div>',
                    width: '0%',
                    type: "number",
                    hidden: true
                }
                ,
                {
                    field: "nombre",
                    title: "Nombre",
                    template: '<div id="item" data-text="#: nombre#">#: nombre#</div>',
                    width: '45%',
                    type: "string"
                }
                ,

                {
                    field: "id_clasificacion",
                    title: "Id_clasificacion",
                    template: '<div id="item" data-text="#: id_clasificacion#">#:id_clasificacion#</div>',
                    width: '0%',
                    type: "number",
                    hidden: true
                }
                ,
                
                {
                    template: "	<div class='btn-group' >" + "<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_clasificacion_ontologia(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
                    "<i class='fa fa-edit '></i>" +
                    "</button>" +
                    "<button class=' btn btn-danger btn-rounded' id='#: idontologia#' onclick='delete_element_clasificacion_ontologiabyonto(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
                    "<i class='fa fa-trash-o' ></i>" +
                    "</button>" +
                    "</div>",
                    name: 'edit',
                    headerTemplate: "Acciones",
                    width: '20%'
                }
            ]
        });
        Clasificacion_ontologia.gridclasificacion_ontologia = $("#gridselection_clasificacion_ontologia").data('kendoGrid');
        function detailInit(e) {
            var detailRow = e.detailRow;
            detailRow.find(".tabstrip").kendoTabStrip({
                animation: {
                    open: {effects: "fadeIn"}
                }
            });
            gridclas= detailRow.find(".grid_clasificaciones").kendoGrid({
                dataSource: {
                    transport: {
                        read: {
                            //type:'POST',
                            url: urlhome+"gestion/clasificacion_ontologia/list_clasbyonto/"+e.data.idontologia,
                            dataType: "json"
                        }
                    },
                    change:function(data)
                    {
                        ////console.clear();
                    },
                    schema:{
                        model:{
                            fields:{
                                idclasifonto:{type:"number"},
                                clasificacion:{type:"string"}
                            }
                        }
                    },
                    pageSize: 8
                },
                height: 490,
                filterable: false,
                sortable: true,
                change: Clasificacion.change,
                resizable: true,
                dataBound: Clasificacion.dataBound,
                dataBinding: Clasificacion.dataBinding,
                pageable: {
                    buttonCount: 5,
                    refresh: true,
                    pageSizes: [2, 10, 20, 30, 50, 100]
                },
                columns: [
                    {
                        field: "Clasificación",
                        template: '<div id="item" data-text="#: clasificacion#">#if( clasificacion==null){#<span>No tiene</span>#}else{##: clasificacion##}#</div>',
                        title: "Clasificación",
                        width: '95%',
                        type: "string"
                    }
                    ,
                    {
                        template: "	<div class='btn-group' >"+
                        "<button class=' btn btn-danger btn-rounded' id='#: idclasifonto#' onclick='delete_element_clasificacion_ontologia(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
                        "<i class='fa fa-trash-o' ></i>" +
                        "</button>" +
                        "</div>",
                        name: 'edit',
                        headerTemplate: "Acciones",
                        width: '20%'
                    }
                ]
            });

        }
    };
    var initBoostrapValidationClasificacion_ontologia = function () {
        /*Form Validation*/
        $('#clasificacion_ontologia_form').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es valido',
            fields: {
                'Clasificacion_ontologia[id_ontologia]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la ontología'
                        },
                    }
                }
                ,
                'Clasificacion_ontologia[id_clasificacion]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la clasificación'
                        },
                        remote: {
                            message: 'Esta ontología ya tiene esta clasificación',
                            url: urlhome + 'gestion/clasificacion_ontologia/findbyukjson',
                            delay: 250,
                            data: function (validator, $field, value) {
                                return {
                                    idclasifonto: validator.getFieldElements('Clasificacion_ontologia[idclasifonto]').val()
                                }
                            }
                        }
                    }
                }

            }
        }).on('error.field.bv', function (e, data) {

            if (data.element[0].type.lastIndexOf("select") == 0) {
                $('#select2-' + data.element[0].id + '-container').html('');
            }
        });
        Clasificacion_ontologia.bootstrapValidator = $('#clasificacion_ontologia_form').data('bootstrapValidator');
    };

    var initBoostrapValidationImportClasificacion_ontologia = function () {
        /*Form Validation Import*/
        $('#importar_form').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es v�lido',
            fields: {
                'importar_excel': {
                    group: '.form-group',
                    validators: {
                        file: {
                            extension: 'xls,xlsx',
                            message: 'Debe tener una extension valida para Excel'
                        }
                        ,
                        notEmpty: {
                            message: 'Entre la direcci�n del Excel'
                        }
                    }
                },
            }
        });

        Clasificacion_ontologia.importarbootstrapValidator = $('#importar_form').data('bootstrapValidator');
    }


    return {
        //main function to initiate the module
        init: function () {
            if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
                initKgridClasificacion_ontologia();
            }
            initForm();
            initRead();
            initId_ontologia();
            initId_clasificacion();
            initBoostrapValidationClasificacion_ontologia();
            initBoostrapValidationImportClasificacion_ontologia()
            $('#all_check_clasificacion_ontologia').iCheck({
                checkboxClass: 'icheckbox_square-blue hover',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
            $('#all_selecc_clasificacion_ontologia').iCheck({
                increaseArea: '20%'
            });
            //Para deschequear y chequear todos los elementos
            $('#all_check_clasificacion_ontologia').on('ifChecked', function (event) {
                $('.check_row').iCheck('check');
            });
            $('#all_selecc_clasificacion_ontologia').on('ifChecked', function (event) {
                $('.check_row').iCheck('check');
            });
            $('#all_check_clasificacion_ontologia').on('ifUnchecked', function (event) {
                $('.check_row').iCheck('uncheck');
            });
            $('#all_selecc_clasificacion_ontologia').on('ifUnchecked', function (event) {
                $('.check_row').iCheck('uncheck');
            });

            $('#all_check_clasificacion_ontologia').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
            //Para deschequear y chequear todos los elementos
            $('#all_check_clasificacion_ontologia').on('ifChecked', function (event) {
                $('.check_row').iCheck('check');
            });
            $('#all_check_clasificacion_ontologia').on('ifUnchecked', function (event) {
                $('.check_row').iCheck('uncheck');
            });

        },

        initForm: function () {
            initForm();
        },

        initRead: function () {
            initRead();
        },

        initId_ontologia: function () {
            initId_ontologia();
        },

        initId_clasificacion: function () {
            initId_clasificacion();
        },

        initBoostrapValidationClasificacion_ontologia: function () {
            initBoostrapValidationClasificacion_ontologia();
        },

        initBoostrapValidationImportClasificacion_ontologia: function () {
            initBoostrapValidationImportClasificacion_ontologia();
        },

    };


}();

