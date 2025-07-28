
<?php $this->title = 'pregunta_respuestas';

?>
<?php
?>
			<h3 class="page-title">Administrar pregunta_respuestas		    </h3>
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
		                <a href="#">pregunta_respuestas</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario pregunta_respuestas-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar pregunta_respuestas</span>
                        <span class="caption-helper">datos del pregunta_respuestas</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_pregunta_respuestas" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'gestion/pregunta_respuestas/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="pregunta_respuestas_form">
                        <h3 class="form-section">pregunta_respuestas Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_respuesta</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_respuesta..." required   id="id_respuesta_combo" name="pregunta_respuestas[id_respuesta]" onkeypress="return permite(event,'car')" >

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
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_pregunta..." required   id="id_pregunta_combo" name="pregunta_respuestas[id_pregunta]" onkeypress="return permite(event,'car')" >

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

                             <input  value="<?= $action ?>" type="hidden" id="taskpregunta_respuestas" name="taskpregunta_respuestas">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idpregunta_respuestas?>"  type="hidden" id="idpregunta_respuestas" name="pregunta_respuestas[idpregunta_respuestas]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idpregunta_respuestas">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_pregunta_respuestas" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_pregunta_respuestas_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/pregunta_respuestas" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana pregunta_respuestas-->
