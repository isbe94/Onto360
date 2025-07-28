/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

var Comentar_onto = {};
var ComponentsComentar_onto = function () {
    var initForm = function () {
        Comentar_onto.comentar_form = $('#form_foro');
    };

    var initId_ontologia = function () {
        Comentar_onto.combobox_ontologia = $("#id_ontologia_combo").select2({
            language: "es",
            ajax: {
                url: urlhome + "rest/list_onto",
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

    var initBoostrapValidationOntologia = function () {
        /*Form Validation*/
        $('#form-comentar').bootstrapValidator({
            //live: 'disabled',
            excluded: ':disabled',   // <=== Adding the 'excluded' option
            feedbackIcons: {
                validating: 'glyphicon glyphicon-refresh'
            },
            message: 'El valor no es valido',
            fields: {
                'Ontologia[nombre]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la ontología'
                        },
                    }
                }

            }
        }).on('error.field.bv', function (e, data) {

            if (data.element[0].type.lastIndexOf("select") == 0) {
                $('#select2-' + data.element[0].id + '-container').html('');
            }
        });
        Clasificacion_ontologia.bootstrapValidator = $('#form-comentar').data('bootstrapValidator');
    };

    return {
        //main function to initiate the module
        init: function () {
            initForm();
            initId_ontologia();
            initBoostrapValidationOntologia();


        },

        initForm: function () {
            initForm();
        },


        initId_ontologia: function () {
            initId_ontologia();
        },


        initBoostrapValidationOntologia: function () {
            initBoostrapValidationOntologia();
        },

    };


}();

jQuery(document).ready(function () {
    ComponentsComentar_onto.init();
});


