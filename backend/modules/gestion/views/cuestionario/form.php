
<?php $this->title = 'Cuestionario';

?>
<?php
?>
			<h3 class="page-title">Administrar Cuestionario		    </h3>
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
		                <a href="#">Cuestionario</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Cuestionario-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Cuestionario</span>
                        <span class="caption-helper">datos del cuestionario</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_cuestionario" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'gestion/cuestionario/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="cuestionario_form">
                        <h3 class="form-section">Cuestionario Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_respuesta</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_respuesta..." required   id="id_respuesta_combo" name="Cuestionario[id_respuesta]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_respuesta.'">'.$model->respuesta->respuesta.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_pregunta</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_pregunta..." required   id="id_pregunta_combo" name="Cuestionario[id_pregunta]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_pregunta.'">'.$model->pregunta->pregunta.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskcuestionario" name="taskcuestionario">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idcuestionario?>"  type="hidden" id="idcuestionario" name="Cuestionario[idcuestionario]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idcuestionario">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_cuestionario" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_cuestionario_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/cuestionario" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Cuestionario-->
