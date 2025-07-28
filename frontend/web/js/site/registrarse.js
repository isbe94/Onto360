/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

var Site = {};
var ComponentsSite = function () {
    var initForm = function () {
        Site.register_form = $('#form-register');
    };

    var initId_catcientifica = function () {
        Site.combobox_categoriacientifica = $("#id_catcientifica_combo").select2({
            language: "es",
            ajax: {
                url: urlhome + "rest/list_catcient",
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

    var initBoostrapValidationUsuario = function () {
        /*Form Validation*/
        $('#form-register').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es valido',
            fields: {
                'Usuario[nombre]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el nombre'
                        }
                    }
                }
                ,
                'Usuario[apellido1]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el primer apellido'
                        }
                    }
                }
                ,
                'Usuario[apellido2]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el segundo apellido'
                        }
                    }
                }
                    ,
                'Usuario[usuario]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el usuario'
                        },
                        remote: {
                            message: 'Este usuario ya existe',
                            url: urlhome + 'rest/validar_user',
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
                        remote: {
                            message: 'Este email ya existe',
                            url: urlhome + "rest/validar_user",
                            delay: 250,
                            data: function (validator, $field, value) {
                                return {
                                    idusuario: $("#idusuario").val()
                                }
                            }
                        },
                        emailAddress: {
                            message: 'Entre un correo valido'
                        }
                    }
                }
            }
        }).on('error.field.bv', function (e, data) {

            if (data.element[0].type.lastIndexOf("select") == 0) {
                $('#select2-' + data.element[0].id + '-container').html('');
            }
        });
        Site.bootstrapValidator = $('#form-register').data('bootstrapValidator');
    };


    return {
        //main function to initiate the module
        init: function () {
            initForm();
            initId_catcientifica();
            initBoostrapValidationUsuario();


        },

        initForm: function () {
            initForm();
        },


        initId_catcientifica: function () {
            initId_catcientifica();
        },


        initBoostrapValidationUsuario: function () {
            initBoostrapValidationUsuario();
        },

    };


}();

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

jQuery(document).ready(function () {
    ComponentsSite.init();
});


