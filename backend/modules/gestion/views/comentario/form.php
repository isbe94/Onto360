
<?php $this->title = 'Comentario';

?>
<?php $idcomentario = -1;?>
<?php
	if ($action == 'update'){
		 $idcomentario = $model->idcomentario;
		} ?>
	<script>
				    var idcomentario =<?= $idcomentario ?>;
	</script>
<?php
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
		                <a href="<?php echo Yii::$app->homeUrl.'gestion' ?>">Gestion</a>
		            </li>
		            <li>
		                <i class="fa fa-angle-right"></i>
		                <a href="#">Comentario</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Comentario-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Comentario</span>
                        <span class="caption-helper">datos del comentario</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_comentario" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'gestion/comentario/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="comentario_form">
                        <h3 class="form-section">Comentario Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_ontologia</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_ontologia..." required   id="id_ontologia_combo" name="Comentario[id_ontologia]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_ontologia.'">'.$model->ontologia->dominio.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Fecha</label>
                            				<input class="form-control" value="<?= $model->fecha?>" maxlength="10" placeholder="Escriba el Fecha..."   type="text" id="fecha" name="Comentario[fecha]" onkeypress="return permite(event,'date')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_usuario</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_usuario..." required   id="id_usuario_combo" name="Comentario[id_usuario]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_usuario.'">'.$model->usuario->usuario.'</option>';
												}?>
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
                        				
                            				<textarea class="form-control" value="" placeholder="Escriba el Comentario..." required  id="comentario" name="Comentario[comentario]" ><?= $model->comentario?></textarea>
                        				</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskcomentario" name="taskcomentario">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idcomentario?>"  type="hidden" id="idcomentario" name="Comentario[idcomentario]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idcomentario">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_comentario" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_comentario_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/comentario" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Comentario-->
