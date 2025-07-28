/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


		var ComponentsRespuesta= function () {
    		var initForm = function () {
				/*Respuesta Formulario*/
				Respuesta.respuesta_form = $('#respuesta_form');
				};

    		var initRead = function () {
				Respuesta.gridDataSource.read();
				};


    		var initKgridRespuesta= function () {
 		/*Grid Respuesta*/
				var $kgridrespuesta =  $("#gridselection_respuesta").kendoGrid({
	        		dataSource: Respuesta.gridDataSource,
		        	height: 490,
		       		filterable: false,
	    	    	sortable: true,
	       	 		change: Respuesta.change,
					resizable: true,
					// detailTemplate: kendo.template($("#template").html()),
					// detailInit: detailInit,
	        		dataBound: Respuesta.dataBound,
	        		dataBinding: Respuesta.dataBinding,
	        		pageable: {
		          	 	 buttonCount: 5,
		           		 refresh: true,
	    	       		 pageSizes: [2,10,20,30,50,100]
	        		},
		        	columns: [
		            	{	                
							field: "",
	        	        	title: "",
	            		    width: '30px',
	                		headerTemplate: "<input class='' id='all_check_respuesta' type='checkbox'/>",
		            	    template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
	    	        	}
						,
						{
							field: "respuesta",
							template:'<div id="item" data-text="#: respuesta#">#:respuesta#</div>',
							title: "Respuesta",
							width: '50%',
							type:"string"
						}
						,
						{
	                		template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_respuesta(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
							  					"<i class='fa fa-edit '></i>" +
												"</button>"+
												"<button class=' btn btn-danger btn-rounded' id='#: uid#' onclick='delete_element_respuesta(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
												"<i class='fa fa-trash-o' ></i>" +
												"</button>" +
												"</div>",
	                		name:'edit',
	                		headerTemplate: "Acciones",
	                		width: '20%'
	            		}
	        		]
	    		});
				Respuesta.gridrespuesta=$("#gridselection_respuesta").data('kendoGrid');
				function detailInit(e) {
            		var detailRow = e.detailRow;
            		detailRow.find(".tabstrip").kendoTabStrip({
                		animation: {
                    		open: {effects: "fadeIn"}
                				}
            			});

            		detailRow.find('#detail_respuesta').html(e.data.respuesta)
        			}
			};
    		var initBoostrapValidationRespuesta= function () {
        	/*Form Validation*/
        		$('#respuesta_form').bootstrapValidator({
            		//live: 'disabled',
            		excluded: ':disabled',   // <=== Adding the 'excluded' option
            		feedbackIcons: {
                		validating: 'glyphicon glyphicon-refresh'
            		},
            		message: 'El valor no es valido',
            		fields: {
                'Respuesta[respuesta]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre la respuesta'
                        },
                    }
                }

            		}
        		}).on('error.field.bv', function(e, data) {

				});
				Respuesta.bootstrapValidator=$('#respuesta_form').data('bootstrapValidator');
			};

    		var initBoostrapValidationImportRespuesta= function () {
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

						Respuesta.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
					}


    		return {
        		//main function to initiate the module
        		init: function () {
					 if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
						initKgridRespuesta();
					}
						initForm();
						initRead();
						initBoostrapValidationRespuesta();
						initBoostrapValidationImportRespuesta()
					$('#all_check_respuesta').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_respuesta').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_respuesta').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
					$('#all_check_respuesta').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_respuesta').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_respuesta').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
        		},

        		initForm:function(){
					initForm();
        		},

        		initRead:function(){
					initRead();
        		},
				
        		initBoostrapValidationRespuesta:function(){
					initBoostrapValidationRespuesta();
        		},

        		initBoostrapValidationImportRespuesta:function(){
					initBoostrapValidationImportRespuesta();
        		},

    		};


		}();

