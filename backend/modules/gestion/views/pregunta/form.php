
<?php $this->title = 'Pregunta';

?>
<?php $idpregunta = -1;?>
<?php
	if ($action == 'update'){
		 $idpregunta = $model->idpregunta;
		} ?>
	<script>
				    var idpregunta =<?= $idpregunta ?>;
	</script>
<?php
?>
			<h3 class="page-title">Administrar Pregunta		    </h3>
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
		                <a href="#">Pregunta</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Pregunta-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Pregunta</span>
                        <span class="caption-helper">datos del pregunta</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_pregunta" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'gestion/pregunta/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="pregunta_form">
                        <h3 class="form-section">Pregunta Info </h3>
							<div class="form-body">

                        	<div class="row" style="margin-bottom: 15px;">
								<div class="form-group">
									<label class="control-label">Pregunta</label>
									<input class="form-control" value="" maxlength="500"
										   placeholder="Escriba la Pregunta..." type="text" id="pregunta"
										   name="Pregunta[pregunta]" onkeypress="return permite(event,'num_car')">
								</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskpregunta" name="taskpregunta">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idpregunta?>"  type="hidden" id="idpregunta" name="Pregunta[idpregunta]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idpregunta">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_pregunta" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_pregunta_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/pregunta" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Pregunta-->
