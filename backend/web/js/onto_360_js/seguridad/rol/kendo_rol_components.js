/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/


		var ComponentsRol= function () {
    		var initForm = function () {
				/*Rol Formulario*/
				Rol.rol_form = $('#rol_form');
				};

    		var initRead = function () {
				Rol.gridDataSource.read();
				};



    		var initKgridRol= function () {
 		/*Grid Rol*/
				var $kgridrol =  $("#gridselection_rol").kendoGrid({
	        		dataSource: Rol.gridDataSource,
		        	height: 490,
		       		filterable: false,
	    	    	sortable: true,
	       	 		change: Rol.change,
					resizable: true,
					// detailTemplate: kendo.template($("#template").html()),
					// detailInit: detailInit,
	        		dataBound: Rol.dataBound,
	        		dataBinding: Rol.dataBinding,
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
	                		headerTemplate: "<input class='' id='all_check_rol' type='checkbox'/>",
		            	    template: "<input class='check_row' id='#: uid#' type='checkbox'/>"
	    	        	}
						,

	            		{
	                		field: "Rol",
							template:'<div id="item" data-text="#: rol#">#if( rol==null){#<span>No tiene</span>#}else{##: rol##}#</div>',
	                		title: "Rol",
	                		width: '95%',
							type:"string"
	            		}
						,
						{
	                		template: "	<div class='btn-group' >" +"<button class=' btn btn-dark btn-rounded' style='margin-right: 0px' id='#: uid#' onclick='showUpdate_rol(this)' data-toggle='tooltip' title='Modificar|Modificar elemento'>" +
							  					"<i class='fa fa-edit '></i>" +
												"</button>"+
												"<button class=' btn btn-danger btn-rounded' id='#: uid#' onclick='delete_element_rol(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
												"<i class='fa fa-trash-o' ></i>" +
												"</button>" +
												"</div>",
	                		name:'edit',
	                		headerTemplate: "Acciones",
	                		width: '20%'
	            		}
	        		]
	    		});
				Rol.gridrol=$("#gridselection_rol").data('kendoGrid');
				function detailInit(e) {
            		var detailRow = e.detailRow;
            		detailRow.find(".tabstrip").kendoTabStrip({
                		animation: {
                    		open: {effects: "fadeIn"}
                				}
            			});

        			}
			};
    		var initBoostrapValidationRol= function () {
        	/*Form Validation*/
        		$('#rol_form').bootstrapValidator({
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
				Rol.bootstrapValidator=$('#rol_form').data('bootstrapValidator');
			};

    		var initBoostrapValidationImportRol= function () {
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

						Rol.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
					}


    		return {
        		//main function to initiate the module
        		init: function () {
					 if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
						initKgridRol();
					}
						initForm();
						initRead();
						initBoostrapValidationRol();
						initBoostrapValidationImportRol()
					$('#all_check_rol').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_rol').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_rol').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
					$('#all_check_rol').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_rol').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_rol').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
        		},

        		initForm:function(){
					initForm();
        		},

        		initRead:function(){
					initRead();
        		},

        		initBoostrapValidationRol:function(){
					initBoostrapValidationRol();
        		},

        		initBoostrapValidationImportRol:function(){
					initBoostrapValidationImportRol();
        		}

    		};


		}();

