/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

var gridresp=null;
var ComponentsPregunta_respuestas= function () {
	var initForm = function () {
		/*Pregunta_respuestas Formulario*/
		Pregunta_respuestas.pregunta_respuestas_form = $('#pregunta_respuestas_form');
	};

	var initRead = function () {
		Pregunta_respuestas.gridDataSource.read();
		Respuesta.gridDataSource.read();
	};


	var initId_respuesta= function () {
		Pregunta_respuestas.combobox_respuesta=$("#id_respuesta_combo").select2({
			language: "es",
			ajax: {
				url: urlhome+"gestion/respuesta/list_json",
				dataType: 'json',
				delay: 100,
				data: function (params) {
					return {
						q: params.term, // search term
						combo:true
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

	var initId_pregunta= function () {
		Pregunta_respuestas.combobox_pregunta=$("#id_pregunta_combo").select2({
			language: "es",
			ajax: {
				url: urlhome+"gestion/pregunta/list_json",
				dataType: 'json',
				delay: 100,
				data: function (params) {
					return {
						q: params.term, // search term
						combo:true
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



	var initKgridPregunta_respuestas= function () {
		/*Grid Pregunta_respuestas*/
		var $kgridpregunta_respuestas = $("#gridselection_pregunta_respuestas").kendoGrid({
			dataSource: Pregunta_respuestas.gridDataSource,
			height: 490,
			filterable: false,
			sortable: true,
			change: Pregunta_respuestas.change,
			resizable: true,
			detailTemplate: kendo.template($("#template").html()),
			detailInit: detailInit,
			dataBound: Pregunta_respuestas.dataBound,
			dataBinding: Pregunta_respuestas.dataBinding,
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
					headerTemplate: "<input class='' id='all_check_pregunta_respuestas' type='checkbox'/>",
					template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
				}
				,

				{
					field: "id_pregunta",
					title: "Id_pregunta",
					template:'<div id="item" data-text="#: id_pregunta#">#:id_pregunta#</div>',
					width: '0%',
					type:"number",
					hidden:true
				}
				,
				{
					field: "id_respuesta",
					title: "Id_respuesta",
					template:'<div id="item" data-text="#: id_respuesta#">#:id_respuesta#</div>',
					width: '0%',
					type:"number",
					hidden:true
				}
				,

				{
					field: "pregunta",
					title: "Pregunta",
					template:'<div id="item" data-text="#: pregunta#">#: pregunta#</div>',
					width: '45%',
					type:"string"
				}
				,
				{
					template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_pregunta_respuestas(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
					"<i class='fa fa-edit '></i>" +
					"</button>"+
					"<button class=' btn btn-danger btn-rounded' id='#: idpregunta#' onclick='delete_element_pregunta_respuestasbypreg(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
					"<i class='fa fa-trash-o' ></i>" +
					"</button>" +
					"</div>",
					name:'edit',
					headerTemplate: "Acciones",
					width: '20%'
				}
			]
		});
		Pregunta_respuestas.gridpregunta_respuestas=$("#gridselection_pregunta_respuestas").data('kendoGrid');
		function detailInit(e) {
			var detailRow = e.detailRow;
			detailRow.find(".tabstrip").kendoTabStrip({
				animation: {
					open: {effects: "fadeIn"}
				}
			});

			gridresp= detailRow.find(".grid_respuesta").kendoGrid({
				dataSource: {
					transport: {
						read: {
							//type:'POST',
							url: urlhome+"gestion/pregunta_respuestas/list_respbycuest/"+e.data.idpregunta,
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
								idpregunta_respuestas:{type:"number"},
								resp_correcta:{type:"number"},
								respuesta:{type:"string"}
							}
						}
					},
					pageSize: 8
				},
				height: 490,
				filterable: false,
				sortable: true,
				change: Respuesta.change,
				resizable: true,
				dataBound: Respuesta.dataBound,
				dataBinding: Respuesta.dataBinding,
				pageable: {
					buttonCount: 5,
					refresh: true,
					pageSizes: [2, 10, 20, 30, 50, 100]
				},
				columns: [
					{
						field: "Respuesta",
						template: '<div id="item" data-text="#: respuesta#">#if( respuesta==null){#<span>No tiene</span>#}else{##: respuesta##}#</div>',
						title: "Respuesta",
						width: '70%',
						type: "string"
					}
					,
					{
						field: "Respuesta Correcta",
						template: '<div data-text="#: resp_correcta#">#if(resp_correcta >= 1)' +
						'{#<span>' + '<div class="icheckbox_square-blue checked"  type="checkbox"></div>' + '</span>#}' +
						'else{#' + '<div class="icheckbox_square-blue "  type="checkbox"></div>' +'#}#</div>',
						title: "Respuesta Correcta",
						width: '30%',
						type: "number"
					}
					,
					{
						template: "	<div class='btn-group' >"+
						"<button class=' btn btn-danger btn-rounded' id='#: idpregunta_respuestas#' onclick='delete_element_pregunta_respuestas(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
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
	var initBoostrapValidationPregunta_respuestas= function () {
		/*Form Validation*/
		$('#pregunta_respuestas_form').bootstrapValidator({
			//live: 'disabled',
			excluded: ':disabled',   // <=== Adding the 'excluded' option
			feedbackIcons: {
				validating: 'glyphicon glyphicon-refresh'
			},
			message: 'El valor no es valido',
			fields: {
				'Pregunta_respuestas[id_respuesta]': {
					group: '.form-group',
					validators: {
						notEmpty: {
							message: 'Entre el id_respuesta'
						},
					}
				}
				,
				'Pregunta_respuestas[id_pregunta]': {
					group: '.form-group',
					validators: {
						notEmpty: {
							message: 'Entre el id_pregunta'
						},
					}
				}
				,
				'Pregunta_respuestas[resp_correcta]': {
					group: '.form-group',
					validators: {
						notEmpty: {
							message: 'Está es la respuesta correcta?'
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
		Pregunta_respuestas.bootstrapValidator=$('#pregunta_respuestas_form').data('bootstrapValidator');
	};

	var initBoostrapValidationImportPregunta_respuestas= function () {
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

		Pregunta_respuestas.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
	}


	return {
		//main function to initiate the module
		init: function () {
			if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
				initKgridPregunta_respuestas();
			}
			initForm();
			initRead();
			initId_respuesta();
			initId_pregunta();
			initBoostrapValidationPregunta_respuestas();
			initBoostrapValidationImportPregunta_respuestas()
			$('#all_check_pregunta_respuestas').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
			//Para deschequear y chequear todos los elementos
			$('#all_check_pregunta_respuestas').on('ifChecked', function(event){
				$('.check_row').iCheck('check');
			});
			$('#all_check_pregunta_respuestas').on('ifUnchecked', function(event){
				$('.check_row').iCheck('uncheck');
			});

			$('#all_check_pregunta_respuestas').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
			//Para deschequear y chequear todos los elementos
			$('#all_check_pregunta_respuestas').on('ifChecked', function(event){
				$('.check_row').iCheck('check');
			});
			$('#all_check_pregunta_respuestas').on('ifUnchecked', function(event){
				$('.check_row').iCheck('uncheck');
			});

		},

		initForm:function(){
			initForm();
		},

		initRead:function(){
			initRead();
		},

		initId_respuesta:function(){
			initId_respuesta();
		},

		initId_pregunta:function(){
			initId_pregunta();
		},

		initBoostrapValidationPregunta_respuestas:function(){
			initBoostrapValidationPregunta_respuestas();
		},

		initBoostrapValidationImportPregunta_respuestas:function(){
			initBoostrapValidationImportPregunta_respuestas();
		},

	};


}();

