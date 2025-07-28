/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/


		var ComponentsCategoriacientifica= function () {
    		var initForm = function () {
				/*Categoriacientifica Formulario*/
				Categoriacientifica.categoriacientifica_form = $('#categoriacientifica_form');
				};

    		var initRead = function () {
				Categoriacientifica.gridDataSource.read();
				};



    		var initKgridCategoriacientifica= function () {
 		/*Grid Categoriacientifica*/
				var $kgridcategoriacientifica =  $("#gridselection_categoriacientifica").kendoGrid({
	        		dataSource: Categoriacientifica.gridDataSource,
		        	height: 490,
		       		filterable: false,
	    	    	sortable: true,
	       	 		change: Categoriacientifica.change,
					resizable: true,
					// detailTemplate: kendo.template($("#template").html()),
					// detailInit: detailInit,
	        		dataBound: Categoriacientifica.dataBound,
	        		dataBinding: Categoriacientifica.dataBinding,
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
	                		headerTemplate: "<input class='' id='all_check_categoriacientifica' type='checkbox'/>",
		            	    template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
	    	        	}
						,

	            		{
	                		field: "Categoría Científica",
							title: "Categoría Científica",
							template:'<div id="item" data-text="#: categcient#">#if( categcient==null){#<span>No tiene</span>#}else{##: categcient##}#</div>',
							width: '95%',
							type:"string"
	            		}
						,
						{
	                		template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_categoriacientifica(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
							  					"<i class='fa fa-edit '></i>" +
												"</button>"+
												"<button class=' btn btn-danger btn-rounded' id='#: uid#' onclick='delete_element_categoriacientifica(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
												"<i class='fa fa-trash-o' ></i>" +
												"</button>" +
												"</div>",
	                		name:'edit',
	                		headerTemplate: "Acciones",
	                		width: '20%'
	            		}
	        		]
	    		});
				Categoriacientifica.gridcategoriacientifica=$("#gridselection_categoriacientifica").data('kendoGrid');
				function detailInit(e) {
            		var detailRow = e.detailRow;
            		detailRow.find(".tabstrip").kendoTabStrip({
                		animation: {
                    		open: {effects: "fadeIn"}
                				}
            			});

        			}
			};
    		var initBoostrapValidationCategoriacientifica= function () {
        	/*Form Validation*/
        		$('#categoriacientifica_form').bootstrapValidator({
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
				Categoriacientifica.bootstrapValidator=$('#categoriacientifica_form').data('bootstrapValidator');
			};

    		var initBoostrapValidationImportCategoriacientifica= function () {
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

						Categoriacientifica.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
					}


    		return {
        		//main function to initiate the module
        		init: function () {
					 if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
						initKgridCategoriacientifica();
					}
						initForm();
						initRead();
						initBoostrapValidationCategoriacientifica();
						initBoostrapValidationImportCategoriacientifica()
					$('#all_check_categoriacientifica').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_categoriacientifica').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_categoriacientifica').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
					$('#all_check_categoriacientifica').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_categoriacientifica').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_categoriacientifica').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
        		},

        		initForm:function(){
					initForm();
        		},

        		initRead:function(){
					initRead();
        		},

        		initBoostrapValidationCategoriacientifica:function(){
					initBoostrapValidationCategoriacientifica();
        		},

        		initBoostrapValidationImportCategoriacientifica:function(){
					initBoostrapValidationImportCategoriacientifica();
        		},

    		};


		}();

