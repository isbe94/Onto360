
<?php $this->title = 'Tecnologia';

?>
<?php
?>
			<h3 class="page-title">Administrar Tecnologia		    </h3>
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
		                <a href="#">Tecnologia</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Tecnologia-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Tecnologia</span>
                        <span class="caption-helper">datos del tecnologia</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_tecnologia" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'gestion/tecnologia/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="tecnologia_form">
                        <h3 class="form-section">Tecnologia Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Tecnologia</label>
                            				<input class="form-control" value="<?= $model->tecnologia?>" maxlength="20" placeholder="Escriba el Tecnologia..." required  type="text" id="tecnologia" name="Tecnologia[tecnologia]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="tasktecnologia" name="tasktecnologia">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idtecnologia?>"  type="hidden" id="idtecnologia" name="Tecnologia[idtecnologia]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idtecnologia">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_tecnologia" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_tecnologia_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/tecnologia" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Tecnologia-->
