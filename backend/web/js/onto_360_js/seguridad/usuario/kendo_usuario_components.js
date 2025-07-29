/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


var ComponentsUsuario = function () {
    var initForm = function () {
        /*Usuario Formulario*/
        Usuario.usuario_form = $('#usuario_form');
    };

    var initRead = function () {
        Usuario.gridDataSource.read();
    };


    var initId_rol = function () {
        Usuario.combobox_rol = $("#id_rol_combo").select2({
            language: "es",
            ajax: {
                url: urlhome + "seguridad/rol/list_json",
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
                        results: data.data
                    };
                },
                cache: true
            }
        });
    };

    var initId_catcientifica = function () {
        Usuario.combobox_categoriacientifica = $("#id_catcientifica_combo").select2({
            language: "es",
            ajax: {
                url: urlhome + "nomencladores/categoriacientifica/list_json",
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
                        results: data.data
                    };
                },
                cache: true
            }
        });
    };

    var initId_experticia = function () {
        Usuario.combobox_experticia = $("#id_experticia_combo").select2({
            language: "es",
            ajax: {
                url: urlhome + "gestion/experticia/list_json",
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
                        results: data.data
                    };
                },
                cache: true
            }
        });
    };

    var initDateRange_created_at = function () {
        /*Date Range Picker  created_at*/
        $("#created_at").daterangepicker({
            singleDatePicker: true,
            startDate: moment(),
            format: 'MM/DD/YYYY',
            showDropdowns: true,
            readonly: true

        }).on('apply.daterangepicker', function (ev, picker) {
            $('#created_at').trigger('input');
        });

        Usuario.created_at = $("#created_at").data('daterangepicker');
    };

    var initDateRange_updated_at = function () {
        /*Date Range Picker  updated_at*/
        $("#updated_at").daterangepicker({
            singleDatePicker: true,
            startDate: moment(),
            format: 'MM/DD/YYYY',
            showDropdowns: true,
            readonly: true

        }).on('apply.daterangepicker', function (ev, picker) {
            $('#updated_at').trigger('input');
        });

        Usuario.updated_at = $("#updated_at").data('daterangepicker');
    };


    var initKgridUsuario = function () {
        /*Grid Usuario*/
        var $kgridusuario = $("#gridselection_usuario").kendoGrid({
            dataSource: Usuario.gridDataSource,
            height: 490,
            filterable: false,
            sortable: true,
            change: Usuario.change,
            resizable: true,
            // detailTemplate: kendo.template($("#template").html()),
            // detailInit: detailInit,
            dataBound: Usuario.dataBound,
            dataBinding: Usuario.dataBinding,
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
                    headerTemplate: "<input class='' id='all_check_usuario' type='checkbox'/>",
                    template: "<input class='check_row' id='#: uid#' type='checkbox'/>"
                }
                ,

                {
                    field: "Usuario",
                    template: '<div id="item" data-text="#: usuario#">#:usuario#</div>',
                    title: "Usuario",
                    width: '20%',
                    type: "string"
                }
                ,

                {
                    field: "Nombre",
                    template: '<div id="item" data-text="#: nombre#">#if( nombre==null){#<span>No tiene</span>#}else{##: nombre##}#</div>',
                    title: "Nombre",
                    width: '20%',
                    type: "string"
                }
                ,


                {
                    field: "Rol",
                    title: "Rol",
                    template: '<div id="item" data-text="#: rol#">#: rol#</div>',
                    width: '20%',
                    type: "string"
                }
                ,


                {
                    field: "Avatar",
                    template: '<div id="item" data-text="#: avatar#">#if( avatar==null){#<span>No tiene</span>#}else{#<img class="user-image img-circle" data-image="#: avatar#" data-usuario="#: usuario#" width="30px" height="30px" src="' + urlhome + '/images/usuarios/#: avatar#">#}#</div>',
                    title: "Avatar",
                    width: '20%',   
                    type: "string"
                }
                ,

                {
                    field: "Primer apellido",
                    template: '<div id="item" data-text="#: apellido1#">#if( apellido1==null){#<span>No tiene</span>#}else{##: apellido1##}#</div>',
                    title: "Primer apellido",
                    width: '20%',
                    type: "string"
                }
                ,

                {
                    field: "Segundo apellido",
                    template: '<div id="item" data-text="#: apellido2#">#if( apellido2==null){#<span>No tiene</span>#}else{##: apellido2##}#</div>',
                    title: "Segundo apellido",
                    width: '20%',
                    type: "string"
                }
                ,

                {
                    field: "Activo",
                    template: '<div data-text="#: activo#">#if(activo==1)' +
                    '{#<span>' + '<div class="icheckbox_square-blue checked"  type="checkbox"></div>' + '</span>#}' +
                    'else{#' + '<div class="icheckbox_square-blue "  type="checkbox"></div>' +'#}#</div>',
                    title: "Activo",
                    width: '10%',
                    type: "number"
                }
                ,
                

                {
                    field: "Categoría Científica",
                    title: "Categoría Científica",
                    template: '<div id="item" data-text="#: categcient#">#: categcient#</div>',
                    width: '20%',
                    type: "string"
                }
                ,


                {
                    field: "Grado experiencia",
                    title: "Grado experiencia",
                    template: '<div id="item" data-text="#: grado_experiencia#">#: grado_experiencia#</div>',
                    width: '20%',
                    type: "string"
                }
                ,

                {
                    field: "Correo",
                    template: '<div id="item" data-text="#: correo#">#if( correo==null){#<span>No tiene</span>#}else{##: correo##}#</div>',
                    title: "Correo",
                    width: '20%',
                    type: "string"
                }
                ,
                {
                    template: "	<div class='btn-group' >" + "<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_usuario(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
                    "<i class='fa fa-edit '></i>" +
                    "</button>" +
                    "<button class=' btn btn-danger btn-rounded' id='#: uid#' onclick='delete_element_usuario(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
                    "<i class='fa fa-trash-o' ></i>" +
                    "</button>" +
                    "</div>",
                    name: 'edit',
                    headerTemplate: "Acciones",
                    width: '35%'
                }
            ]
        });
        Usuario.gridusuario = $("#gridselection_usuario").data('kendoGrid');
        function detailInit(e) {
            var detailRow = e.detailRow;
            detailRow.find(".tabstrip").kendoTabStrip({
                animation: {
                    open: {effects: "fadeIn"}
                }
            });

        }
    };
    var initBoostrapValidationUsuario = function () {

        /*Form Validation*/
        $('#usuario_form').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es valido',
            fields: {
                'Usuario[usuario]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el usuario'
                        },
                        remote: {
                            message: 'Este usuario ya existe',
                            url: urlhome + 'seguridad/usuario/findbyukjson',
                            delay: 250,
                            data: function (validator, $field, value) {
                                return {
                                    idusuario: validator.getFieldElements('Usuario[idusuario]').val()
                                }
                            }
                        }
                    }
                }
                ,
                'Usuario[contrasena]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la Contraseña'
                        }
                    }
                }
                ,
                'Usuario[id_rol]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el Rol'
                        }
                    }
                }
                ,
                'Usuario[activo]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Está activo?'
                        }
                    }
                }
                ,
                'Usuario[id_catcientifica]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la Categoría Científica'
                        }
                    }
                }
                ,
                'Usuario[correo]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el email'
                        },
                        emailAddress: {
                            message: 'Entre un correo valido'
                        },
                        remote: {
                            message: 'Este email del usuario ya esta insertado',
                            url: urlhome + 'seguridad/usuario/findbyukjson',
                            delay: 250,
                            data: function (validator, $field, value) {
                                return {
                                    idusuario: validator.getFieldElements('Usuario[idusuario]').val()
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
        Usuario.bootstrapValidator = $('#usuario_form').data('bootstrapValidator');
    };

    var initBoostrapValidationImportUsuario = function () {
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
                }
            }
        });

        Usuario.importarbootstrapValidator = $('#importar_form').data('bootstrapValidator');
    }


    return {
        //main function to initiate the module
        init: function () {
            if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
                initKgridUsuario();
            }
            initForm();
            initRead();
            initId_rol();
            initId_catcientifica();
            initId_experticia();
            initDateRange_created_at();
            initDateRange_updated_at();
            initBoostrapValidationUsuario();
            initBoostrapValidationImportUsuario()
            $('#all_check_usuario').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
            //Para deschequear y chequear todos los elementos
            $('#all_check_usuario').on('ifChecked', function (event) {
                $('.check_row').iCheck('check');
            });
            $('#all_check_usuario').on('ifUnchecked', function (event) {
                $('.check_row').iCheck('uncheck');
            });

            $('#all_check_usuario').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
            //Para deschequear y chequear todos los elementos
            $('#all_check_usuario').on('ifChecked', function (event) {
                $('.check_row').iCheck('check');
            });
            $('#all_check_usuario').on('ifUnchecked', function (event) {
                $('.check_row').iCheck('uncheck');
            });

        },

        initForm: function () {
            initForm();
        },

        initRead: function () {
            initRead();
        },

        initId_rol: function () {
            initId_rol();
        },

        initId_catcientifica: function () {
            initId_catcientifica();
        },

        initId_experticia: function () {
            initId_experticia();
        },

        initDateRange_created_at: function () {
            initDateRange_created_at();
        },

        initDateRange_updated_at: function () {
            initDateRange_updated_at();
        },

        initBoostrapValidationUsuario: function () {
            initBoostrapValidationUsuario();
        },

        initBoostrapValidationImportUsuario: function () {
            initBoostrapValidationImportUsuario();
        }

    };


}();

