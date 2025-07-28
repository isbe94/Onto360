/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/


var ComponentsOntologia= function () {
	var initForm = function () {
		/*Ontologia Formulario*/
		Ontologia.ontologia_form = $('#ontologia_form');
	};

	var initRead = function () {
		Ontologia.gridDataSource.read();
	};

	

	var initKgridOntologia= function () {
		/*Grid Ontologia*/
		var $kgridontologia =  $("#gridselection_ontologia").kendoGrid({
			dataSource: Ontologia.gridDataSource,
			height: 490,
			filterable: false,
			sortable: true,
			change: Ontologia.change,
			resizable: true,
			// detailTemplate: kendo.template($("#template").html()),
			// detailInit: detailInit,
			dataBound: Ontologia.dataBound,
			dataBinding: Ontologia.dataBinding,
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
					headerTemplate: "<input class='' id='all_check_ontologia' type='checkbox'/>",
					template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
				}
				,

				{
					field: "dominio",
					template:'<div id="item" data-text="#: dominio#">#:dominio#</div>',
					title: "Dominio",
					width: '20%',
					type:"string"
				}
				,

				{
					field: "fichero",
					template:'<div id="item" data-text="#: fichero#">#:fichero#</div>',
					title: "Fichero",
					width: '20%',
					type:"string"
				}
				,

				{
					field: "nombre",
					template:'<div id="item" data-text="#: nombre#">#:nombre#</div>',
					title: "Nombre",
					width: '20%',
					type:"string"
				}
				,
				{
					field: "name_space",
					template: '<div id="item" data-text="#: name_space#">#if( name_space==""){#<span>-</span>#}else{##: name_space##}#</div>',
					title: "Namespace",
					width: '20%',
					type:"string"
				}
				,
				{
					field: "version",
					template: '<div id="item" data-text="#: version#">#if( version==""){#<span>-</span>#}else{##: version##}#</div>',
					title: "Versión",
					width: '20%',
					type:"float"
				}
				,
				{
					field: "lenguaje",
					template: '<div id="item" data-text="#: lenguaje#">#if( lenguaje==""){#<span>-</span>#}else{##: lenguaje##}#</div>',
					title: "Lenguaje",
					width: '20%',
					type:"string"
				}
				,
				{
					template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_ontologia(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
					"<i class='fa fa-edit '></i>" +
					"</button>"+
					"<button class=' btn btn-danger btn-rounded ' id='#: uid#'  data-style='expand-right' onclick='delete_element_ontologia(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
					"<i class='fa fa-trash-o' ></i><span class=''></span>" +
					"</button>" +
					"</div>",
					name:'edit',
					headerTemplate: "Acciones",
					width: '20%'
				}
			]
		});
		Ontologia.gridontologia=$("#gridselection_ontologia").data('kendoGrid');
		function detailInit(e) {
			var detailRow = e.detailRow;
			detailRow.find(".tabstrip").kendoTabStrip({
				animation: {
					open: {effects: "fadeIn"}
				}
			});

		}
	};

	var initBoostrapValidationOntologia= function () {
		/*Form Validation*/
		$('#ontologia_form').bootstrapValidator({
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
				'Ontologia[nombre]': {
					group: '.form-group',
					validators: {
						notEmpty: {
							message: 'Entre el nombre'
						},
						remote: {

							message: 'Este nombre de ontologia ya está insertado',
							url:urlhome+'gestion/ontologia/findbyukjson',
							delay:250,
							data: function(validator, $field, value) {
								return {
									idontologia: $('#idontologia').val(),
								}
							}
						}
					}
				}

			}
		}).on('error.field.bv', function(e, data) {

			if(data.element[0].type.lastIndexOf("select")==0)
			{
				$('#select2-'+data.element[0].id+'-container').html('');
			}
		});
		Ontologia.bootstrapValidator=$('#ontologia_form').data('bootstrapValidator');
	};

	var initBoostrapValidationOntologiaUpdate= function () {
		/*Form Validation*/
		$('#ontologia_form').bootstrapValidator({
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

							message: 'Este nombre de ontologia ya está insertado',
							url:urlhome+'gestion/ontologia/findbyukjson',
							delay:250,
							data: function(validator, $field, value) {
								return {
									idontologia: $('#idontologia').val(),
								}
							}
						}
					}
				}

			}
		}).on('error.field.bv', function(e, data) {

			if(data.element[0].type.lastIndexOf("select")==0)
			{
				$('#select2-'+data.element[0].id+'-container').html('');
			}
		});
		Ontologia.bootstrapValidator=$('#ontologia_form').data('bootstrapValidator');
	};

	var initBoostrapValidationImportOntologia= function () {
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

		Ontologia.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
	}


	return {
		//main function to initiate the module
		init: function () {
			if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
				initKgridOntologia();
			}
			initForm();
			initRead();
			initBoostrapValidationOntologia();
			initBoostrapValidationImportOntologia();
			$('#all_check_ontologia').iCheck({
				checkboxClass: 'icheckbox_square-blue hover',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
			//Para deschequear y chequear todos los elementos
			$('#all_check_ontologia').on('ifChecked', function(event){
				$('.check_row').iCheck('check');
			});
			$('#all_check_ontologia').on('ifUnchecked', function(event){
				$('.check_row').iCheck('uncheck');
			});

			$('#all_check_ontologia').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
			//Para deschequear y chequear todos los elementos
			$('#all_check_ontologia').on('ifChecked', function(event){
				$('.check_row').iCheck('check');
			});
			$('#all_check_ontologia').on('ifUnchecked', function(event){
				$('.check_row').iCheck('uncheck');
			});

		},

		initForm:function(){
			initForm();
		},

		initRead: function () {
			initRead();
		},

		initBoostrapValidationOntologia:function(){
			initBoostrapValidationOntologia();
		},

		initBoostrapValidationImportOntologia:function(){
			initBoostrapValidationImportOntologia();
		},

	};


}();
