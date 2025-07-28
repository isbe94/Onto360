
<?php $this->title = 'Respuesta';

?>
<?php $idrespuesta = -1;?>
<?php
	if ($action == 'update'){
		 $idrespuesta = $model->idrespuesta;
		} ?>
	<script>
				    var idrespuesta =<?= $idrespuesta ?>;
	</script>
<?php
?>
			<h3 class="page-title">Administrar Respuesta		    </h3>
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
		                <a href="#">Respuesta</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Respuesta-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Respuesta</span>
                        <span class="caption-helper">datos del respuesta</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_respuesta" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'gestion/respuesta/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="respuesta_form">
                        <h3 class="form-section">Respuesta Info </h3>
							<div class="form-body">

                        	<div class="row" style="margin-bottom: 15px;">
								<div class="col-md-12">
                    				<div class="form-group">
                        				<label class="control-label col-md-12">Respuesta</label>
                        				
                            				<textarea class="form-control" value="" placeholder="Escriba el Respuesta..." required  id="respuesta" name="Respuesta[respuesta]" ><?= $model->respuesta?></textarea>
                        				</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskrespuesta" name="taskrespuesta">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idrespuesta?>"  type="hidden" id="idrespuesta" name="Respuesta[idrespuesta]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idrespuesta">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_respuesta" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_respuesta_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/respuesta" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Respuesta-->
