/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Tue Jun 20 15:54:10 EDT 2017*/

var PerfilOnto={};
var ComponentsPerfilOnto = function () {

    var initForm = function () {
        PerfilOnto.perfilonto_form=$('#form_onto_perfil');
    };

    var initId_clasificacion = function () {
        PerfilOnto.combobox_clasificacion = $("#id_clasificacion_combo").select2({
            language: "es",
            multiple:true,
            ajax: {
                url: urlhome + "rest/list_clasif",
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
    
    var initId_clasificacionUpdate = function () {
        PerfilOnto.combobox_clasificacion = $("#id_clasificacion_combo").select2({
            language: "es",
            multiple: true,
            ajax: {
                url: urlhome + "rest/list_clasif",
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
        $combo.val([1, 2]).trigger("change");
    };

    var initId_tecnologia = function () {
        PerfilOnto.combobox_tecnologia = $("#id_tecnologia_combo").select2({
            language: "es",
            ajax: {
                url: urlhome + "rest/list_tec",
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



    var initBoostrapValidationOntologia = function () {
        /*Form Validation*/
        $('#form_onto_perfil').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es valido',
            fields: {
                'Ontologia[dominio]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el dominio'
                        },
                    }
                }
                ,
                'Ontologia[fichero]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el fichero'
                        },
                        file: {
                            extension: 'owl,rdf',
                            maxSize: 1024 * 1024 * 1024 * 1024 * 1024,
                            message: 'Seleccione un archivo .owl o .rdf  menor de 5 Mb'

                        }
                    }
                }
                ,
                'Ontologia[version]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la versión'
                        },

                    }
                }
                ,
                'Ontologia[nombre]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el nombre'
                        },
                        remote: {

                            message: 'Este nombre de ontologia ya esta insertado',
                            url: urlhome + 'rest/validar_onto',
                            delay: 250,
                            data: function (validator, $field, value) {
                                return {
                                    idontologia: $('#idontologia').val(),
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
        PerfilOnto.bootstrapValidator = $('#form_onto_perfil').data('bootstrapValidator');
    };


    var initBoostrapValidationOntologiaUpdate = function () {
        /*Form Validation*/
        $('#form_onto_perfil').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es valido',
            fields: {
                'Ontologia[dominio]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el dominio'
                        },
                        
                    }
                },
                'Ontologia[version]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la versión'
                        },

                    }
                }
                ,
                'Ontologia[nombre]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el nombre'
                        },
                        remote: {
                            message: 'Este nombre de ontologia ya esta insertado',
                            url: urlhome + 'rest/validar_onto',
                            delay: 250,
                            data: function (validator, $field, value) {
                                return {
                                    idontologia: $('#idontologia').val(),
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
        PerfilOnto.bootstrapValidator = $('#form_onto_perfil').data('bootstrapValidator');
    };




    return {
        //main function to initiate the module
        init: function () {
            initForm();
            initId_clasificacion();
            initId_tecnologia();
            if (update && update != "no") {
                array_clasificaciones.forEach(function (element, index, array) {
                    PerfilOnto.combobox_clasificacion.append('<option selected="" value="' + element.id + '">' + element.name + '</option>').change();
                });

                PerfilOnto.combobox_clasificacion.val(array_clasificaciones_id);
                initBoostrapValidationOntologiaUpdate()
            }
            else {
                initBoostrapValidationOntologia()
            }

        },

        initForm: function () {
            initForm();
        },

        initId_clasificacion: function () {
            initId_clasificacion();
        },

        initId_tecnologia: function () {
            initId_tecnologia();
        },

        initBoostrapValidationOntologia: function () {
            initBoostrapValidationOntologia();
        },


    };


}();



jQuery(document).ready(function () {
    ComponentsPerfilOnto.init();
    $("#fichero").change(function () {
        var pos=this.value.lastIndexOf('.');
        var ext=this.value.substr(pos+1);
        $('#lenguaje').html(ext);
        $('#language').val(ext);

    });
});


