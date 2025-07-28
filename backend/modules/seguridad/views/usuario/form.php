
<?php $this->title = 'Usuario';

?>
<?php
?>
			<h3 class="page-title">Administrar Usuario		    </h3>
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
		                <a href="#">Usuario</a>
		            </li>
		        </ul>
		    </div>
<!--Inicio de Formulario Usuario-->
        <div class="page_form">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Insertar Usuario</span>
                        <span class="caption-helper">datos del usuario</span>
                    </div>
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_usuario" href="#" class="reload">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="<?php echo Yii::$app->homeUrl.'seguridad/usuario/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="usuario_form">
                        <h3 class="form-section">Usuario Info </h3>
							<div class="form-body">

                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Usuario</label>
                            				<input class="form-control" value="<?= $model->usuario?>" maxlength="64" placeholder="Escriba el Usuario..." required  type="text" id="usuario" name="Usuario[usuario]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Nombre</label>
                            				<input class="form-control" value="<?= $model->nombre?>" maxlength="64" placeholder="Escriba el Nombre..."   type="text" id="nombre" name="Usuario[nombre]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Contrasena</label>
                            				<input class="form-control" value="<?= $model->contrasena?>" maxlength="45" placeholder="Escriba el Contrasena..." required  type="text" id="contrasena" name="Usuario[contrasena]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_rol</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_rol..." required   id="id_rol_combo" name="Usuario[id_rol]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_rol.'">'.$model->rol->rol.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Auth_key</label>
                            				<input class="form-control" value="<?= $model->auth_key?>" maxlength="255" placeholder="Escriba el Auth_key..."   type="text" id="auth_key" name="Usuario[auth_key]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Created_at</label>
                            				<input class="form-control" value="<?= $model->created_at?>" maxlength="10" placeholder="Escriba el Created_at..."   type="text" id="created_at" name="Usuario[created_at]" onkeypress="return permite(event,'date')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Updated_at</label>
                            				<input class="form-control" value="<?= $model->updated_at?>" maxlength="10" placeholder="Escriba el Updated_at..."   type="text" id="updated_at" name="Usuario[updated_at]" onkeypress="return permite(event,'date')">
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Avatar</label>
                            				<input class="form-control" value="<?= $model->avatar?>" maxlength="45" placeholder="Escriba el Avatar..."   type="text" id="avatar" name="Usuario[avatar]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Apellido1</label>
                            				<input class="form-control" value="<?= $model->apellido1?>" maxlength="40" placeholder="Escriba el Apellido1..."   type="text" id="apellido1" name="Usuario[apellido1]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Apellido2</label>
                            				<input class="form-control" value="<?= $model->apellido2?>" maxlength="20" placeholder="Escriba el Apellido2..."   type="text" id="apellido2" name="Usuario[apellido2]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Activo</label>
                            				<input class="form-control" value="<?= $model->activo?>" maxlength="10" placeholder="Escriba el Activo..." required  type="number" id="activo" name="Usuario[activo]" onkeypress="return permite(event,'num')">
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Experto</label>
                            				<input class="form-control" value="<?= $model->experto?>" maxlength="10" placeholder="Escriba el Experto..."   type="number" id="experto" name="Usuario[experto]" onkeypress="return permite(event,'num')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_catcientifica</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_catcientifica..." required   id="id_catcientifica_combo" name="Usuario[id_catcientifica]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_catcientifica.'">'.$model->categoriacientifica->categcient.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Id_experticia</label>
                            <div>			 
								<select class="form-control" style="width: 280px;" placeholder="Escoja el Id_experticia..."    id="id_experticia_combo" name="Usuario[id_experticia]" onkeypress="return permite(event,'car')" >

												<?php if($action=='update'){
												echo '<option selected="" value="'.$model->id_experticia.'">'.$model->experticia->grado_experiencia.'</option>';
												}?>
                            				</select>
										</div>
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                        	<div class="row" style="">
								<div class="col-md-6">
                    				<div class="form-group">
                        				<label class="control-label">Correo</label>
                            				<input class="form-control" value="<?= $model->correo?>" maxlength="50" placeholder="Escriba el Correo..."   type="text" id="correo" name="Usuario[correo]" onkeypress="return permite(event,'num_car')">
                    				</div>
                				</div>
                        	</div>
							<!--/row-->
                             <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

                             <input  value="<?= $action ?>" type="hidden" id="taskusuario" name="taskusuario">

        					  <?php if($action=='update'){?>
        					  		<input value="<?= $model->idusuario?>"  type="hidden" id="idusuario" name="Usuario[idusuario]">
        					  <?php } else { ?>
								<input value="-1" type="hidden" id="idusuario">
							<?php } ?>
        					  <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
        				</div>
        				<div class="btn-group pull-right">
							<button type="button" id="btnaction_usuario" class="btn btn-primary btn-rounded btnaction">
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
							</button>
					   		<?php if( $action!='update') { 
?>							<button type="button" id="btnaction_usuario_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction">
                                		<span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                   		</button>
							<?php }?>
							<a  href= "<?php echo Yii::$app->homeUrl ?>seguridad/usuario" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
								<span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
							</a>
						</div>
    				</form>
    <!-- END FORM-->
                </div>
            </div>
        </div>
    <!--                Fin de Ventana Usuario-->
