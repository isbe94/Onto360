
<?php $this->title = 'Comentario'; ?>
<?php
?>
<?php
		if(count($this->css)>0)
			foreach($this->css as $css)
			{
				echo '<link href="'.$css.'" rel="stylesheet">';
			}
		?>
			<h3 class="page-title">Administrar Comentario		    </h3>
		    <div class="page-bar">
		        <ul class="page-breadcrumb">
		            <li>
		                <i class="fa fa-home"></i>
		                <a href="<?php echo Yii::$app->homeUrl?>">Inicio</a>
		                <i class="fa fa-angle-right"></i>
		            </li>
		            <li>
		                <a href="<?php echo Yii::$app->homeUrl.'gestion' ?>">Gestión</a>
		            </li>
		            <li>
		                <i class="fa fa-angle-right"></i>
		                <a href="#">Comentario</a>
		            </li>
		        </ul>
		    </div>
   <div class='row' style=' margin-left:0px;margin-bottom:10px; '>	<div class=" btn-group pull-right" style="margin-right: 50px">
        <a id="pdf_comentario" title="Exportar PDf" id="ToolTables_table-editable_1"
           class="btn btn-default ">
            <span>
					<i class="icon-printer"></i>
					<span class='separator'></span>
			</span>
		</a>
		<a  id="excel_comentario_importar" class="btn btn-default ">
            <span><i class="icon-action-undo"></i></span></a>
    </div>
	<div class="actions">
        <div class="btn-group">

        	<button id="deletebutton_comentario"  type="button" class="btn btn-dark btn-rounded btn-danger">
            	<i class='fa fa-trash-o'></i>
            	<span class="hidden-480" data-translate="btn_delete">Eliminar</span>
        	</button>
    	</div>
	</div>
 </div>
        <div class="portlet-body">
            <div style="" class="table-container">
                <div class="content box box-primary">
					<div class="row" style="margin-bottom: 20px;margin-right: 10px" >
        					<div class="col-md-9">
            					<div class="input-icon right pull-right">
                					<input type="text" class="form-control form-white pull-right" style="width: 170%;border: 1px solid #101010;" id="text-search-comentario" placeholder="Buscar...">
                						<i class="icon-magnifier"></i>
            					</div>
        					</div>
        					<div class="col-md-1">
        						<button type="button" id="clear-filter-comentario" class="btn btn-dark">Limpiar</button>
        					</div>
    				</div>
                   <div id="gridselection_comentario"  style="width:100%"></div>
                </div>
            </div>
        </div>
<!--Inicio de Ventana Comentario-->
    <div id="modal_comentario" role="dialog" class="modal fade modal-scroll" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="true" data-width="760">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h4 class="modal-title"><strong><span data-translate="title_add_comentario" id="title_comentario"> Insertar comentario</span></strong></h4>
        </div>
        <div class="modal-body">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_comentario" href="#" class="reload">
                        </a>
						 <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="#"  class="horizontal-form" enctype="multipart/form-data"   id="comentario_form">
                        <h3 class="form-section">Información Comentario  </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Ontología</label>
                            <div>
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_ontologia..." required   id="id_ontologia_combo" name="Comentario[nombre]" onkeypress="return permite(event,'car')" >

                            				</select>
										</div>
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Fecha</label>
                            				<input class="form-control" value="" maxlength="10" placeholder="Escriba el Fecha..."   type="text" id="fecha" name="Comentario[fecha]" onkeypress="return permite(event,'date')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Usuario</label>
                            <div>
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_usuario..." required   id="id_usuario_combo" name="Comentario[usuario]" onkeypress="return permite(event,'car')" >

                            				</select>
										</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="margin-bottom: 15px;">
								<div class="col-md-12">
                    				<div class="form-group">
                        				<label class="control-label col-md-12">Comentario</label>

                            				<textarea class="form-control" value="" placeholder="Escriba el Comentario..." required  id="comentario" name="Comentario[comentario]" ></textarea>
                        				</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->

                             <input  value="insert" type="hidden" id="taskcomentario" name="taskcomentario">
        					  <input value="-1"  type="hidden" id="idcomentario" name="Comentario[idcomentario]">
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
				<div class="row" style="margin-bottom: 20px;"></div>
				<div class="btn-group pull-right">
					<button type="button" id="btnaction_comentario" class="btn btn-primary btn-rounded btnaction" >
						<span class="hidden-480" data-translate="btn_ok">Guardar</span>
					</button>
					<button type="button" id="btnaction_comentario_new" class="btn bg-green btnaction" >
                                <span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   </button>
					<button type="button" data-dismiss="modal" class="btn default btn-rounded">
						<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
					</button>
				</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
</div>
    <!--                Fin de Ventana Comentario-->
<!--Inicio de Ventana Comentario-->
    <div id="list_comentario_pdf" role="dialog" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="true" data-width="90%">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h4 class="modal-title"><i class="icon-equalizer"></i><strong><span data-translate="title_add_comentario">Listado de comentario</span></strong></h4>
        </div>
        <div class="modal-body">
            <div class="portlet light bg-inverse">
				<div class="btn-group pull-right">
					<button type="button" id="export_comentario_pdf" class="btn bg-danger btn-rounded">
						<span class="hidden-480" data-translate="btn_pdf">PDF</span>
					</button>
					<button type="button"id="excel_comentario" data-dismiss="modal" class="btn default bg-green btn-rounded">
						<span class="hidden-480" data-translate="btn_excel">Excel</span>
					</button>
				</div>
                <div class="portlet-body form table-scrollable">



		        	<div class="pdf-page size-a4" id="table_comentario_pdf">
						<div class="pdf-header">
							<h2>Listado de Comentarios</h2>
						</div>
						<div class="pdf-body">
							<div style="" class="" data-role="grid" id="">
								<table class="table table-striped table-advance">
									<thead>
		<th nowrap="">
			comentario
			</th>
		<th nowrap="">
			nombre
			</th>
		<th nowrap="">
			fecha
			</th>
		<th nowrap="">
			usuario
			</th>

		        					</thead>
									<tbody id="tbody_table_comentario">
		        					</tbody>
								</table>
							</div>
						</div>
                			</div>
            		</div>
        		</div>
    		</div>
    	</div>
    <!--                Fin de Ventana Comentario-->
<!--                Ventana para importar -->

 <div id="import_comentario" role="dialog" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="true" data-width="50%">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			    </div>
			    <div class="modal-body">
			        <div class="portlet light bg-inverse">
			            <div class="portlet-title">
			                <div class="caption">
			                    <i class="icon-equalizer font-red-sunglo"></i>
			                    <span class="caption-subject font-red-sunglo bold uppercase" id="title_comentario_imp" >Importar Comentario</span>
			                </div>
			                <div class="tools">
			                </div>
			            </div>

			            <div class="portlet-body form">

			                <form method="post" class="horizontal-form" enctype="multipart/form-data"  id="importar_form">
		                    <div class="col-md-12 pull-right">
			                        <div class="col-md-4">
			                            <input name="importar_excel" id="importar_excel" data-edit="insertImage" type="file">
			                        </div>
			                        <div class="col-md-4">
			                            <button type="button" id="importar_comentario_excel" class="btn green pull-right">Importar</button>
			                        </div>
			                    </div>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
        <form action="comentario/excel" method="post" id="form_excel_export" style="display: none">
	    	<input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">
	    	<input type="hidden" id="comentario_export" name="comentario_export" value="">
		</form>
<?php
		if(!$index)
		if(count($this->js)>0)
			foreach($this->js as $js)
			{
				echo '<script src="'.$js.'" ><script/>';
			}
		?>
<!--                Template del GRID -->
<script type="text/x-kendo-template" id="template">
	<div class="tabstrip">
		<ul>
			<li class="k-state-active">
				Datos Generales
			</li>
		</ul>
		<div>
			<div>
				<!-- List group -->
				<div class="grid_comentarios"></div>
			</div>
		</div>
	</div>
</script>
