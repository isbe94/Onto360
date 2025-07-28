
<?php $this->title = 'Rol';

?>
<?php
?>
			<h3 class="page-title">Administrar Rol		    </h3>
		    <div class="page-bar">
		        <ul class="page-breadcrumb">
		            <li>
		                <i class="fa fa-home"></i>
		                <a href="<?php echo Yii::$app->homeUrl?>">Inicio</a>
		                <i class="fa fa-angle-right"></i>
		            </li>
		            <li>
		                <a href="<?php echo Yii::$app->homeUrl.'seguridad' ?>">Seguridad</a>
		            </li>
		            <li>
		                <i class="fa fa-angle-right"></i>
		                <a href="#">Rol</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Rol-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Rol</span>
                        <span class="caption-helper">datos del rol</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_rol" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'seguridad/rol/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="rol_form">
                        <h3 class="form-section">Rol Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Rol</label>
                            				<input class="form-control" value="<?= $model->rol?>" maxlength="40" placeholder="Escriba el Rol..."   type="text" id="rol" name="Rol[rol]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskrol" name="taskrol">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idrol?>"  type="hidden" id="idrol" name="Rol[idrol]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idrol">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_rol" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_rol_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>seguridad/rol" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Rol-->
