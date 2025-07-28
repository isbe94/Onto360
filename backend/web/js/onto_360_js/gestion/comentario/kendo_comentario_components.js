/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

var gridcoment=null;
		var ComponentsComentario= function () {
    		var initForm = function () {
				/*Comentario Formulario*/
				Comentario.comentario_form = $('#comentario_form');
				};

    		var initRead = function () {
				Comentario.gridDataSource.read();
				};


    		var initId_ontologia= function () {
				Comentario.combobox_ontologia=$("#id_ontologia_combo").select2({
					language: "es",
						ajax: {
						url: urlhome+"gestion/ontologia/list_json",
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

    		var initId_usuario= function () {
				Comentario.combobox_usuario=$("#id_usuario_combo").select2({
					language: "es",
						ajax: {
						url: urlhome+"seguridad/usuario/list_json",
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

    		var initDateRange_fecha= function () {
				/*Date Range Picker  fecha*/
				$("#fecha").daterangepicker({
					singleDatePicker: true,
					startDate: moment(),
					format: 'MM/DD/YYYY',
					showDropdowns: true,
					readonly:true

				}).on('apply.daterangepicker', function(ev, picker) {
            		$('#fecha').trigger('input');
        		});
		
				Comentario.fecha=$("#fecha").data('daterangepicker');
    		};

    		var initCkeditor_comentario= function () {
    		if (CKEDITOR.instances['comentario'])
        {
            CKEDITOR.instances['comentario'].destroy();
            Comentario.comentario_editor==null;

        }
    		Comentario.comentario_editor=CKEDITOR.replace('comentario',{
    		    on: {
                change: function () {
					 $('#comentario').val(Comentario.comentario_editor.getData());
                    $('#comentario').trigger('input');
                },
            }
    		});
			  var item=Comentario.findbyidcomentario(idcomentario)
				if(item)
					CKEDITOR.instances.comentario.setData(item.comentario);
    		};


    		var initKgridComentario= function () {
 		/*Grid Comentario*/
				var $kgridcomentario =  $("#gridselection_comentario").kendoGrid({
	        		dataSource: Comentario.gridDataSource,
		        	height: 490,
		       		filterable: false,
	    	    	sortable: true,
	       	 		change: Comentario.change,
					resizable: true,
					detailTemplate: kendo.template($("#template").html()),
					detailInit: detailInit,
	        		dataBound: Comentario.dataBound,
	        		dataBinding: Comentario.dataBinding,
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
	                		headerTemplate: "<input class='' id='all_check_comentario' type='checkbox'/>",
		            	    template: "<input class='check_row' id='#: uid#' type='checkbox'/>",
	    	        	}
						,
						{
							field: "id_ontologia",
							title: "Id_ontologia",
							template: '<div id="item" data-text="#: id_ontologia#">#:id_ontologia#</div>',
							width: '0%',
							type: "number",
							hidden: true
						}
						,
	            		{
	                		field: "Ontologia",
	                		title: "Ontología",
							template:'<div id="item" data-text="#: nombre#">#:nombre#</div>',
	                		width: '45%',
							type:"string"
						}
						,
						{
	                		template: "	<div class='btn-group' >" +
												"<button class=' btn btn-danger btn-rounded' id='#: idontologia#' onclick='delete_element_comentariobyonto(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
												"<i class='fa fa-trash-o' ></i>" +
												"</button>" +
												"</div>",
	                		name:'edit',
	                		headerTemplate: "Acciones",
	                		width: '35%'
	            		}
	        		]
	    		});
				Comentario.gridcomentario=$("#gridselection_comentario").data('kendoGrid');
				function detailInit(e) {
            		var detailRow = e.detailRow;
            		detailRow.find(".tabstrip").kendoTabStrip({
                		animation: {
                    		open: {effects: "fadeIn"}
                				}
            			});

					gridcoment= detailRow.find(".grid_comentarios").kendoGrid({
						dataSource: {
							transport: {
								read: {
									//type:'POST',
									url: urlhome+"gestion/comentario/list_comentbyonto/"+e.data.idontologia,
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
										idcomentario:{type:"number"},
										comentario:{type:"string"},
										fecha:{type:"date"}
									}
								}
							},
							pageSize: 8
						},
						height: 490,
						filterable: false,
						sortable: true,
						change: Comentario.change,
						resizable: true,
						dataBound: Comentario.dataBound,
						dataBinding: Comentario.dataBinding,
						pageable: {
							buttonCount: 5,
							refresh: true,
							pageSizes: [2, 10, 20, 30, 50, 100]
						},
						columns: [
							{
								field: "fecha",
								title: "Fecha",
								width: '20%',
								type:"date",
								format:"{0:dd-MM-yyyy}"
							}
							,

							{
								field: "comentario",
								title: "Comentario",
								template:'<div id="item" data-text="#: comentario#">#:comentario#</div>',
								width: '20%',
								type:"string"
							}
							,
							{
								field: "usuario",
								title: "Usuario",
								template:'<div id="item" data-text="#: usuario#">#: usuario#</div>',
								width: '20%',
								type:"string"
							}
							,
							{
								template: "	<div class='btn-group' >"+
								"<button class=' btn btn-danger btn-rounded' id='#: idcomentario#' onclick='delete_element_comentario(this)' data-toggle='tooltip' title='Eliminar|Eliminar elemento'>" +
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
    		var initBoostrapValidationComentario= function () {
        	/*Form Validation*/
        		$('#comentario_form').bootstrapValidator({
            		//live: 'disabled',
            		excluded: ':disabled',   // <=== Adding the 'excluded' option
            		feedbackIcons: {
                		validating: 'glyphicon glyphicon-refresh'
            		},
            		message: 'El valor no es valido',
            		fields: {
                'Comentario[id_ontologia]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el id_ontologia'
                        },
                    }
                }
                        ,
                'Comentario[id_usuario]': {
                    group: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'Entre el id_usuario'
                        },
                    }
                },
						'Comentario[comentario]': {
							group: '.form-group',
							validators: {
								notEmpty: {
									message: 'Entre el comentario'
								},
							}
						}


            		}
        		}).on('error.field.bv', function(e, data) {

					if(data.element[0].type.lastIndexOf("select")==0)
					{
						$('#select2-'+data.element[0].id+'-container').html('');
					}
				});
				Comentario.bootstrapValidator=$('#comentario_form').data('bootstrapValidator');
			};

    		var initBoostrapValidationImportComentario= function () {
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

						Comentario.importarbootstrapValidator=$('#importar_form').data('bootstrapValidator');
					}


    		return {
        		//main function to initiate the module
        		init: function () {
					 if (!window.location.pathname.includes("create") && !window.location.pathname.includes("update")) {
						initKgridComentario();
					}
						initForm();
						initRead();
						initId_ontologia();
						initId_usuario();
						initDateRange_fecha();
						initCkeditor_comentario();
						initBoostrapValidationComentario();
						initBoostrapValidationImportComentario()
					$('#all_check_comentario').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_comentario').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_comentario').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
					$('#all_check_comentario').iCheck({
						checkboxClass: 'icheckbox_square-blue',
						radioClass: 'iradio_square-blue',
						increaseArea: '20%'
					});
					//Para deschequear y chequear todos los elementos
					$('#all_check_comentario').on('ifChecked', function(event){
						$('.check_row').iCheck('check');
					});
					$('#all_check_comentario').on('ifUnchecked', function(event){
						$('.check_row').iCheck('uncheck');
					});
		
        		},

        		initForm:function(){
					initForm();
        		},

        		initRead:function(){
					initRead();
        		},

        		initId_ontologia:function(){
					initId_ontologia();
        		},

        		initId_usuario:function(){
					initId_usuario();
        		},

        		initDateRange_fecha:function(){
					initDateRange_fecha();
        		},

        		initCkeditor_comentario:function(){
					initCkeditor_comentario();
        		},

        		initBoostrapValidationComentario:function(){
					initBoostrapValidationComentario();
        		},

        		initBoostrapValidationImportComentario:function(){
					initBoostrapValidationImportComentario();
        		},

    		};


		}();

