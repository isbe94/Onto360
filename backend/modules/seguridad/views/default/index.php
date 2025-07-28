
<?php $this->title = 'Seguridad';?>

<div class="x_title">
    <h4>
        <i class="fa fa-home" style="font-size:30px">
        </i>
        <a href="<?php echo Yii::$app->homeUrl?>">
            Inicio
        </a>
        /

        <a href="<?php echo Yii::$app->homeUrl.'seguridad' ?>">
            Seguridad</a>
        
    </h4>
    <div class="clearfix"></div>
</div>
				<div class="Seguridad-default-index">
					<h1>Seguridad</h1>
					<div class="tiles">

					<a href="<?= Yii::$app->homeUrl?>seguridad/rol">
						<div class="tile bg-green-turquoise">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Rol
								</div>
								<div class="number">
									<?= count(backend\modules\seguridad\models\Rol::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					<a href="<?= Yii::$app->homeUrl?>seguridad/usuario">
						<div class="tile bg-red-flamingo">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Usuario
								</div>
								<div class="number">
									<?= count(backend\modules\seguridad\models\Usuario::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					</div>				</div>
