
<?php $this->title = 'Categoría Científica';

?>
<?php
?>
			<h3 class="page-title">Administrar Categoría Científica		    </h3>
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
		                <a href="#">Categoría Científica</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Categoriacientifica-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Categoría Científica</span>
                        <span class="caption-helper">Datos de la Categoría Científica</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_categoriacientifica" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'nomencladores/categoriacientifica/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="categoriacientifica_form">
                        <h3 class="form-section">Información Categoría Científica  </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Categoría Científica</label>
                            				<input class="form-control" value="<?= $model->categcient?>" maxlength="30" placeholder="Escriba la Categoría Científica..."   type="text" id="categcient" name="Categoriacientifica[categcient]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskcategoriacientifica" name="taskcategoriacientifica">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idcatcientifica?>"  type="hidden" id="idcatcientifica" name="Categoriacientifica[idcatcientifica]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idcatcientifica">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_categoriacientifica" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_categoriacientifica_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>nomencladores/categoriacientifica" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Categoriacientifica-->
