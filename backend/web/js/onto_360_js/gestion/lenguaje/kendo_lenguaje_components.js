/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/


var ComponentsLenguaje= function () {
    var initForm = function () {
        /*Lenguaje Formulario*/
        Lenguaje.lenguaje_form = $('#lenguaje_form');
    };

    var initRead = function () {
        Lenguaje.gridDataSource.read();
    };



    var initKgridLenguaje= function () {
        /*Grid Lenguaje*/
        var $kgridlenguaje =  $("#gridselection_lenguaje").kendoGrid({
            dataSource: Lenguaje.gridDataSource,
            height: 490,
            filterable: false,
            sortable: true,
            change: Lenguaje.change,
            resizable: true,
            // detailTemplate: kendo.template($("#template").html()),
            // detailInit: detailInit,
            dataBound: Lenguaje.dataBound,
            dataBinding: Lenguaje.dataBinding,
            pageable: {
                buttonCount: 5,
                refresh: true,
                pageSizes: [2,10,20,30,50,100]
            },
            columns: [
                {
                    field: "",
                    title: "",
                    width: '35px',
                    headerTemplate: "<input class='' id='all_check_lenguaje' type='checkbox'/>",
                    template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
                }
                ,

                {
                    field: "lenguaje",
                    template:'<div id="item" data-text="#: lenguaje#">#:lenguaje#</div>',
                    title: "Lenguaje",
                    width: '45%',
                    type:"string"
                }
                ,
                {
                    template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_lenguaje(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
                    "<i class='fa fa-edit '></i>" +
                    "</button>"+
                    "<button class=' btn btn-danger btn-rounded ladda-button' id='#: uid#'  data-style='expand-right' onclick='delete_element_lenguaje(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
                    "<i class='fa fa-trash-o' ></i><span class='ladda-label'></span>" +
                    "</button>" +
                    "</div>",
                    name:'edit',
                    headerTemplate: "Acciones",
                    width: '20%'
                }
            ]
        });
        Lenguaje.gridlenguaje=$("#gridselection_lenguaje").data('kendoGrid');
        function detailInit(e) {
            var detailRow = e.detailRow;
            detailRow.find(".tabstrip").kendoTabStrip({
                animation: {
                    open: {effects: "fadeIn"}
                }
            });

        }
    };
    var initBoostrapValidationLenguaje= function () {
        /*Form Validation*/
        $('#lenguaje_form').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es valido',
            fields: {
                'Lenguaje[lenguaje]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el lenguaje'
                        },
                        remote: {

                            message: 'Este lenguaje  ya esta insertado',
                            url:urlhome+'gestion/lenguaje/findbyukjson',
                            delay:250,
                            data: function(validator, $field, value) {
                                return {
                                    idlenguaje: $('#idlenguaje').val(),
                                }
                            }
                        }
                    }
                }

            }
        }).on('error.field.bv', function(e, data) {

        });
        Lenguaje.bootstrapValidator=$('#lenguaje_form').data('bootstrapValidator');
    };

    var initBoostrapValidationImportLenguaje= function () {
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

        Lenguaje.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
    }


    return {
        //main function to initiate the module
        init: function () {
            if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
                initKgridLenguaje();
            }
            initForm();
            initBoostrapValidationLenguaje();
            initBoostrapValidationImportLenguaje()
            $('#all_check_lenguaje').iCheck({
                checkboxClass: 'icheckbox_square-blue hover',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
            //Para deschequear y chequear todos los elementos
            $('#all_check_lenguaje').on('ifChecked', function(event){
                $('.check_row').iCheck('check');
            });
            $('#all_check_lenguaje').on('ifUnchecked', function(event){
                $('.check_row').iCheck('uncheck');
            });

            $('#all_check_lenguaje').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
            //Para deschequear y chequear todos los elementos
            $('#all_check_lenguaje').on('ifChecked', function(event){
                $('.check_row').iCheck('check');
            });
            $('#all_check_lenguaje').on('ifUnchecked', function(event){
                $('.check_row').iCheck('uncheck');
            });

        },

        initForm:function(){
            initForm();
        },

        initBoostrapValidationLenguaje:function(){
            initBoostrapValidationLenguaje();
        },

        initBoostrapValidationImportLenguaje:function(){
            initBoostrapValidationImportLenguaje();
        },

    };


}();

