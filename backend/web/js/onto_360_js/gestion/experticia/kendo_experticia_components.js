/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


		var ComponentsExperticia= function () {
    		var initForm = function () {
				/*Experticia Formulario*/
				Experticia.experticia_form = $('#experticia_form');
				};

    		var initRead = function () {
				Experticia.gridDataSource.read();
				};



    		var initKgridExperticia= function () {
 		/*Grid Experticia*/
				var $kgridexperticia =  $("#gridselection_experticia").kendoGrid({
	        		dataSource: Experticia.gridDataSource,
		        	height: 490,
		       		filterable: false,
	    	    	sortable: true,
	       	 		change: Experticia.change,
					resizable: true,
					// detailTemplate: kendo.template($("#template").html()),
					// detailInit: detailInit,
	        		dataBound: Experticia.dataBound,
	        		dataBinding: Experticia.dataBinding,
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
	                		headerTemplate: "<input class='' id='all_check_experticia' type='checkbox'/>",
		            	    template: "<input class='check_row' id='#: uid#' type='checkbox'/>"
	    	        	}
						,

	            		{
	                		field: "Grado Experiencia",
							template:'<div id="item" data-text="#: grado_experiencia#">#if( grado_experiencia==null){#<span>No tiene</span>#}else{##: grado_experiencia##}#</div>',
	                		title: "Grado_experiencia",
	                		width: '95%',
							type:"string"
	            		}
						,
						{
	                		template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_experticia(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
							  					"<i class='fa fa-edit '></i>" +
												"</button>"+
												"<button class=' btn btn-danger btn-rounded' id='#: uid#' onclick='delete_element_experticia(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
												"<i class='fa fa-trash-o' ></i>" +
												"</button>" +
												"</div>",
	                		name:'edit',
	                		headerTemplate: "Acciones",
	                		width: '20%'
	            		}
	        		]
	    		});
				Experticia.gridexperticia=$("#gridselection_experticia").data('kendoGrid');
				function detailInit(e) {
            		var detailRow = e.detailRow;
            		detailRow.find(".tabstrip").kendoTabStrip({
                		animation: {
                    		open: {effects: "fadeIn"}
                				}
            			});

        			}
			};
    		var initBoostrapValidationExperticia= function () {
        	/*Form Validation*/
        		$('#experticia_form').bootstrapValidator({
            		//live: 'disabled',
            		excluded: ':disabled',   // <=== Adding the 'excluded' option
            		feedbackIcons: {
                		validating: 'glyphicon glyphicon-refresh'
            		},
            		message: 'El valor no es valido',
            		fields: {

            		}
        		}).on('error.field.bv', function(e, data) {

				});
				Experticia.bootstrapValidator=$('#experticia_form').data('bootstrapValidator');
			};

    		var initBoostrapValidationImportExperticia= function () {
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
								}
							}
						});

						Experticia.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
					}


    		return {
        		//main function to initiate the module
        		init: function () {
					 if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
						initKgridExperticia();
					}
						initForm();
						initRead();
						initBoostrapValidationExperticia();
						initBoostrapValidationImportExperticia()
					$('#all_check_experticia').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_experticia').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_experticia').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
					$('#all_check_experticia').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_experticia').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_experticia').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
        		},

        		initForm:function(){
					initForm();
        		},

        		initRead:function(){
					initRead();
        		},

        		initBoostrapValidationExperticia:function(){
					initBoostrapValidationExperticia();
        		},

        		initBoostrapValidationImportExperticia:function(){
					initBoostrapValidationImportExperticia();
        		}

    		};


		}();

