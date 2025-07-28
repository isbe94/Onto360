/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


		var ComponentsPregunta= function () {
    		var initForm = function () {
				/*Pregunta Formulario*/
				Pregunta.pregunta_form = $('#pregunta_form');
				};

    		var initRead = function () {
				Pregunta.gridDataSource.read();
				};


    		


    		var initKgridPregunta= function () {
 		/*Grid Pregunta*/
				var $kgridpregunta =  $("#gridselection_pregunta").kendoGrid({
	        		dataSource: Pregunta.gridDataSource,
		        	height: 490,
		       		filterable: false,
	    	    	sortable: true,
	       	 		change: Pregunta.change,
					resizable: true,
					// detailTemplate: kendo.template($("#template").html()),
					//detailInit: detailInit,
	        		dataBound: Pregunta.dataBound,
	        		dataBinding: Pregunta.dataBinding,
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
	                		headerTemplate: "<input class='' id='all_check_pregunta' type='checkbox'/>",
		            	    template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
	    	        	}
						,
						{
							field: "pregunta",
							template:'<div id="item" data-text="#: pregunta#">#:pregunta#</div>',
							title: "Pregunta",
							width: '50%',
							type:"string"
						}
						,
						{
	                		template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_pregunta(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
							  					"<i class='fa fa-edit '></i>" +
												"</button>"+
												"<button class=' btn btn-danger btn-rounded' id='#: uid#' onclick='delete_element_pregunta(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
												"<i class='fa fa-trash-o' ></i>" +
												"</button>" +
												"</div>",
	                		name:'edit',
	                		headerTemplate: "Acciones",
	                		width: '20%'
	            		}
	        		]
	    		});
				Pregunta.gridpregunta=$("#gridselection_pregunta").data('kendoGrid');
				function detailInit(e) {
            		var detailRow = e.detailRow;
            		detailRow.find(".tabstrip").kendoTabStrip({
                		animation: {
                    		open: {effects: "fadeIn"}
                				}
            			});

            		detailRow.find('#detail_pregunta').html(e.data.pregunta)
        			}
			};
    		var initBoostrapValidationPregunta= function () {
        	/*Form Validation*/
        		$('#pregunta_form').bootstrapValidator({
            		//live: 'disabled',
            		excluded: ':disabled',   // <=== Adding the 'excluded' option
            		feedbackIcons: {
                		validating: 'glyphicon glyphicon-refresh'
            		},
            		message: 'El valor no es valido',
            		fields: {
                'Pregunta[pregunta]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la pregunta'
                        },
                    }
                }

            		}
        		}).on('error.field.bv', function(e, data) {

				});
				Pregunta.bootstrapValidator=$('#pregunta_form').data('bootstrapValidator');
			};

    		var initBoostrapValidationImportPregunta= function () {
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

						Pregunta.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
					}


    		return {
        		//main function to initiate the module
        		init: function () {
					 if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
						initKgridPregunta();
					}
						initForm();
						initRead();
						initBoostrapValidationPregunta();
						initBoostrapValidationImportPregunta()
					$('#all_check_pregunta').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_pregunta').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_pregunta').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
					$('#all_check_pregunta').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_pregunta').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_pregunta').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
        		},

        		initForm:function(){
					initForm();
        		},

        		initRead:function(){
					initRead();
        		},


        		initBoostrapValidationPregunta:function(){
					initBoostrapValidationPregunta();
        		},

        		initBoostrapValidationImportPregunta:function(){
					initBoostrapValidationImportPregunta();
        		},

    		};


		}();

