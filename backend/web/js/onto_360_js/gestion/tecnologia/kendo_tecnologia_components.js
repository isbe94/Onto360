/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/


		var ComponentsTecnologia= function () {
    		var initForm = function () {
				/*Tecnologia Formulario*/
				Tecnologia.tecnologia_form = $('#tecnologia_form');
				};

    		var initRead = function () {
				Tecnologia.gridDataSource.read();
				};



    		var initKgridTecnologia= function () {
 		/*Grid Tecnologia*/
				var $kgridtecnologia =  $("#gridselection_tecnologia").kendoGrid({
	        		dataSource: Tecnologia.gridDataSource,
		        	height: 490,
		       		filterable: false,
	    	    	sortable: true,
	       	 		change: Tecnologia.change,
					resizable: true,
					// detailTemplate: kendo.template($("#template").html()),
					// detailInit: detailInit,
	        		dataBound: Tecnologia.dataBound,
	        		dataBinding: Tecnologia.dataBinding,
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
	                		headerTemplate: "<input class='' id='all_check_tecnologia' type='checkbox'/>",
		            	    template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
	    	        	}
						,

	            		{
	                		field: "tecnologia",
							template:'<div id="item" data-text="#: tecnologia#">#:tecnologia#</div>',
	                		title: "Tecnología",
	                		width: '45%',
							type:"string"
	            		}
						,

	            		{
	                		field: "direccion",
							template:'<div id="item" data-text="#: direccion#"><a target="_blank" href="#:direccion#">#:direccion#</a></div>',
	                		title: "Dirección",
	                		width: '45%',
							type:"string"
	            		}
						,
						{
	                		template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_tecnologia(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
							  					"<i class='fa fa-edit '></i>" +
												"</button>"+
												"<button class=' btn btn-danger btn-rounded ladda-button' id='#: uid#'  data-style='expand-right' onclick='delete_element_tecnologia(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
												"<i class='fa fa-trash-o' ></i><span class='ladda-label'></span>" +
												"</button>" +
												"</div>",
	                		name:'edit',
	                		headerTemplate: "Acciones",
	                		width: '20%'
	            		}
	        		]
	    		});
				Tecnologia.gridtecnologia=$("#gridselection_tecnologia").data('kendoGrid');
				function detailInit(e) {
            		var detailRow = e.detailRow;
            		detailRow.find(".tabstrip").kendoTabStrip({
                		animation: {
                    		open: {effects: "fadeIn"}
                				}
            			});

        			}
			};
    		var initBoostrapValidationTecnologia= function () {
        	/*Form Validation*/
        		$('#tecnologia_form').bootstrapValidator({
            		//live: 'disabled',
            		excluded: ':disabled',   // <=== Adding the 'excluded' option
            		feedbackIcons: {
                		validating: 'glyphicon glyphicon-refresh'
            		},
            		message: 'El valor no es valido',
            		fields: {
                'Tecnologia[tecnologia]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el tecnologia'
                        },
                        remote: {

                            message: 'Este tecnologia del tecnologia ya esta insertado',
                            url:urlhome+'gestion/tecnologia/findbyukjson',
							 delay:250,
                            data: function(validator, $field, value) {
								return {
							  			idtecnologia: $('#idtecnologia').val(),
								 }
							}
                        }
                    }
                }
                        ,
                'Tecnologia[direccion]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el direccion'
                        },
                    }
                }

            		}
        		}).on('error.field.bv', function(e, data) {

				});
				Tecnologia.bootstrapValidator=$('#tecnologia_form').data('bootstrapValidator');
			};

    		var initBoostrapValidationImportTecnologia= function () {
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

						Tecnologia.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
					}


    		return {
        		//main function to initiate the module
        		init: function () {
					 if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
						initKgridTecnologia();
					}
						initForm();
						initBoostrapValidationTecnologia();
						initBoostrapValidationImportTecnologia()
					$('#all_check_tecnologia').iCheck({
						checkboxClass: 'icheckbox_square-blue hover',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_tecnologia').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_tecnologia').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
					$('#all_check_tecnologia').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_tecnologia').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_tecnologia').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
        		},

        		initForm:function(){
					initForm();
        		},

        		initBoostrapValidationTecnologia:function(){
					initBoostrapValidationTecnologia();
        		},

        		initBoostrapValidationImportTecnologia:function(){
					initBoostrapValidationImportTecnologia();
        		},

    		};


		}();

