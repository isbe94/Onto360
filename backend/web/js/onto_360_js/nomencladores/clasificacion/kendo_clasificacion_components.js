/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/


var ComponentsClasificacion= function () {
	var initForm = function () {
		/*Clasificacion Formulario*/
		Clasificacion.clasificacion_form = $('#clasificacion_form');
	};

	var initRead = function () {
		Clasificacion.gridDataSource.read();
	};





	var initKgridClasificacion= function () {
		/*Grid Clasificacion*/
		var $kgridclasificacion =  $("#gridselection_clasificacion").kendoGrid({
			dataSource: Clasificacion.gridDataSource,
			height: 490,
			filterable: false,
			sortable: true,
			change: Clasificacion.change,
			resizable: true,
			// detailTemplate: kendo.template($("#template").html()),
			// detailInit: detailInit,
			dataBound: Clasificacion.dataBound,
			dataBinding: Clasificacion.dataBinding,
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
					headerTemplate: "<input class='' id='all_check_clasificacion' type='checkbox'/>",
					template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
				}
				,

				{
					field: "Clasificación",
					template:'<div id="item" data-text="#: clasificacion#">#if( clasificacion==null){#<span>No tiene</span>#}else{##: clasificacion##}#</div>',
					title: "Clasificación",
					width: '95%',
					type:"string"
				}
				,
				{
					template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_clasificacion(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
					"<i class='fa fa-edit '></i>" +
					"</button>"+
					"<button class=' btn btn-danger btn-rounded' id='#: uid#' onclick='delete_element_clasificacion(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
					"<i class='fa fa-trash-o' ></i>" +
					"</button>" +
					"</div>",
					name:'edit',
					headerTemplate: "Acciones",
					width: '20%'
				}
			]
		});
		Clasificacion.gridclasificacion=$("#gridselection_clasificacion").data('kendoGrid');
		function detailInit(e) {
			var detailRow = e.detailRow;
			detailRow.find(".tabstrip").kendoTabStrip({
				animation: {
					open: {effects: "fadeIn"}
				}
			});

		}
	};
	var initBoostrapValidationClasificacion= function () {
		/*Form Validation*/
		$('#clasificacion_form').bootstrapValidator({
			//live: 'disabled',
			excluded: ':disabled',   // <=== Adding the 'excluded' option
			feedbackIcons: {
				validating: 'glyphicon glyphicon-refresh'
			},
			message: 'El valor no es valido',
			fields: {
				'Clasificacion[clasificacion]': {
					group: '.form-group',
					validators: {
						notEmpty: {
							message: 'Entre el clasificacion'
						},
						remote: {

							message: 'Esta clasificación ya esta insertada',
							url:urlhome+'nomencladores/clasificacion/findbyukjson',
							delay:250,
							data: function(validator, $field, value) {
								return {
									idclasificacion: $('#idclasificacion').val(),
								}
							}
						}
					}
				}

			}
		}).on('error.field.bv', function(e, data) {

		});
		Clasificacion.bootstrapValidator=$('#clasificacion_form').data('bootstrapValidator');
	};

	var initBoostrapValidationImportClasificacion= function () {
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

		Clasificacion.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
	}


	return {
		//main function to initiate the module
		init: function () {
			if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
				initKgridClasificacion();
			}
			initForm();
			initRead();
			initBoostrapValidationClasificacion();
			initBoostrapValidationImportClasificacion()
			$('#all_check_clasificacion').iCheck({
				checkboxClass: 'icheckbox_square-blue hover',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
			//Para deschequear y chequear todos los elementos
			$('#all_check_clasificacion').on('ifChecked', function(event){
				$('.check_row').iCheck('check');
			});
			$('#all_check_clasificacion').on('ifUnchecked', function(event){
				$('.check_row').iCheck('uncheck');
			});

			$('#all_check_clasificacion').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
			//Para deschequear y chequear todos los elementos
			$('#all_check_clasificacion').on('ifChecked', function(event){
				$('.check_row').iCheck('check');
			});
			$('#all_check_clasificacion').on('ifUnchecked', function(event){
				$('.check_row').iCheck('uncheck');
			});

		},

		initForm:function(){
			initForm();
		},
		initRead:function () {
			initRead();
		},

		initBoostrapValidationClasificacion:function(){
			initBoostrapValidationClasificacion();
		},

		initBoostrapValidationImportClasificacion:function(){
			initBoostrapValidationImportClasificacion();
		},

	};


}();

