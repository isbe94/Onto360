
<?php $this->title = 'Clasificacion_ontologia';

?>
<?php
?>
			<h3 class="page-title">Administrar Clasificacion_ontologia		    </h3>
		    <div class="page-bar">
		        <ul class="page-breadcrumb">
		            <li>
		                <i class="fa fa-home"></i>
		                <a href="<?php echo Yii::$app->homeUrl?>">Inicio</a>
		                <i class="fa fa-angle-right"></i>
		            </li>
		            <li>
		                <a href="<?php echo Yii::$app->homeUrl.'gestion' ?>">Gestion</a>
		            </li>
		            <li>
		                <i class="fa fa-angle-right"></i>
		                <a href="#">Clasificacion_ontologia</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Clasificacion_ontologia-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Clasificación Ontología</span>
                        <span class="caption-helper">Datos de la Clasificación Ontología</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_clasificacion_ontologia" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'gestion/clasificacion_ontologia/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="clasificacion_ontologia_form">
                        <h3 class="form-section">Clasificacion_ontologia Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_ontologia</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_ontologia..." required   id="id_ontologia_combo" name="Clasificacion_ontologia[id_ontologia]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_ontologia.'">'.$model->ontologia->nombre.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_clasificacion</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_clasificacion..." required   id="id_clasificacion_combo" name="Clasificacion_ontologia[id_clasificacion][]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_clasificacion.'">'.$model->clasificacion->clasificacion.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskclasificacion_ontologia" name="taskclasificacion_ontologia">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idclasifonto?>"  type="hidden" id="idclasifonto" name="Clasificacion_ontologia[idclasifonto]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idclasifonto">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_clasificacion_ontologia" class="btn btn-primary btn-rounded btnaction  " data-style="expand-left" >
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_clasificacion_ontologia_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction " data-style="zoom-in">
                                		<span class="hidden-480 " data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/clasificacion_ontologia" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480 " data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Clasificacion_ontologia-->
