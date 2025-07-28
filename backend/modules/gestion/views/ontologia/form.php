
<?php $this->title = 'Ontologia';
?>
<?php
?>
<h3 class="page-title">Administrar Ontologia		    </h3>
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
			<a href="#">Ontologia</a>
		</li>
	</ul>
</div>
<!--Inicio de Formulario Ontologia-->
<div class="page_form">
	<div class="portlet light bg-inverse">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-equalizer font-red-sunglo"></i>
				<span class="caption-subject font-red-sunglo bold uppercase">Insertar Ontologia</span>
				<span class="caption-helper">datos del ontologia</span>
			</div>
			<div class="tools">
				<a title="" data-original-title="" id="reload_ontologia" href="#" class="reload">
				</a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->

			<form action="<?php echo Yii::$app->homeUrl.'gestion/ontologia/'.$action?>" method="post" class="horizontal-form" enctype="multipart/form-data"   id="ontologia_form">
				<h3 class="form-section">Ontologia Info </h3>
				<div class="form-body">

					<div class="row" style="">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Dominio</label>
								<input class="form-control" value="<?= $model->dominio?>" maxlength="45" placeholder="Escriba el Dominio..." required  type="text" id="dominio" name="Ontologia[dominio]" onkeypress="return permite(event,'num_car')">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input class="form-control" value="<?= $model->nombre?>" maxlength="40" placeholder="Escriba el Nombre..." required  type="text" id="nombre" name="Ontologia[nombre]" onkeypress="return permite(event,'num_car')">
							</div>
						</div>
					</div>
					<!--/row-->
					<div class="row" style="">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Versión</label>
								<input class="form-control" value="<?= $model->version?>" step="0.1" maxlength="9" placeholder="Escriba la versión..." required  type="number" id="version" name="Ontologia[version]" onkeypress="return permite(event,'dec')">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Lenguaje</label>
								<input class="form-control" value="<?= $model->lenguaje?>" maxlength="20" placeholder="Escriba el lenguaje..."  type="text" id="lenguaje" name="Ontologia[lenguaje]" onkeypress="return permite(event,'num_car')">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Namespace</label>
								<input class="form-control" value="<?= $model->name_space?>" maxlength="500" placeholder="Escriba el Namespace..."  type="text" id="name_space" name="Ontologia[name_space]" onkeypress="return permite(event,'num_car')">
							</div>
						</div>
					</div>
					<div class="row" style="">
						<div class="col-md-6">
							<label class="control-label">Seleccione fichero de ontología</label>
							<div class="form-group">
								<div class="col-md-12 pull-right">
									<div class="col-md-4">
										<span class="hidden-480" data-translate="btn_ok"
										<input type="hidden"> <input class="" value="<?= $model->fichero?>"
																	 placeholder="" required
																	 type="file" id="fichero"
																	 name="Ontologia[fichero]" " ></input>
										</span>
										&nbsp; <a href="javascript:;" class="close fileinput-exists"
												  data-dismiss="fileinput">
										</a>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!--/row-->
					<input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">

					<input  value="<?= $action ?>" type="hidden" id="taskontologia" name="taskontologia">

					<?php if($action=='update'){?>
						<input value="<?= $model->idontologia?>"  type="hidden" id="idontologia" name="Ontologia[idontologia]">
					<?php } else { ?>
						<input value="-1" type="hidden" id="idontologia">
					<?php } ?>
					<input value="" type="hidden" id="btnsubmit" name="btnsubmit">
				</div>
				<div class="btn-group pull-right">
					<button type="button" id="btnaction_ontologia" class="btn btn-primary btn-rounded btnaction  ladda-button" data-style="expand-left" >
								<span class="hidden-480" data-translate="btn_ok">
									<?php if ($action == 'create') {  echo 'Guardar';  } else echo 'Actualizar'; ?>
								</span>
					</button>
					<?php if( $action!='update') {
						?>							<button type="button" id="btnaction_ontologia_new" onclick='return setsubmitbtn(this)' class="btn bg-green btnaction ladda-button" data-style="zoom-in">
							<span class="hidden-480 ladda-label" data-translate="btn_ok_new">Guardar y nuevo </span>
						</button>
					<?php }?>
					<a  href= "<?php echo Yii::$app->homeUrl ?>gestion/ontologia" onclick='return setsubmitbtn(this)' class="btn default btn-rounded">
						<span class="hidden-480 ladda-label" data-translate="btn_cancel">Cancelar</span>
					</a>
				</div>
			</form>
			<!-- END FORM-->
		</div>
	</div>
</div>
<!--                Fin de Ventana Ontologia-->
