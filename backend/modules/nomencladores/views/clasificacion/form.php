
<?php $this->title = 'Clasificacion';

?>
<?php
?>
			<h3 class="page-title">Administrar Clasificacion		    </h3>
		    <div class="page-bar">
		        <ul class="page-breadcrumb">
		            <li>
		                <i class="fa fa-home"></i>
		                <a href="<?php echo Yii::$app->homeUrl?>">Inicio</a>
		                <i class="fa fa-angle-right"></i>
		            </li>
		            <li>
		                <a href="<?php echo Yii::$app->homeUrl.'nomencladores' ?>">Nomencladores</a>
		            </li>
		            <li>
		                <i class="fa fa-angle-right"></i>
		                <a href="#">Clasificacion</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Clasificacion-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Clasificacion</span>
                        <span class="caption-helper">datos del clasificacion</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_clasificacion" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'nomencladores/clasificacion/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="clasificacion_form">
                        <h3 class="form-section">Clasificacion Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Clasificacion</label>
                            				<input class="form-control" value="<?= $model->clasificacion?>" maxlength="50" placeholder="Escriba el Clasificacion..." required  type="text" id="clasificacion" name="Clasificacion[clasificacion]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskclasificacion" name="taskclasificacion">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idclasificacion?>"  type="hidden" id="idclasificacion" name="Clasificacion[idclasificacion]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idclasificacion">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_clasificacion" class="btn btn-primary btn-rounded btnaction  ladda-button" data-style="expand-left" >
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_clasificacion_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction ladda-button" data-style="zoom-in">
                                		<span class="hidden-480 ladda-label" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>nomencladores/clasificacion" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480 ladda-label" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Clasificacion-->
