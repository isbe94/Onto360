
<?php $this->title = 'Nomencladores';?>

<div class="x_title">
    <h4>
        <i class="fa fa-home" style="font-size:30px">
        </i>
        <a href="<?php echo Yii::$app->homeUrl?>">
            Inicio
        </a>
        /

        <a href="<?php echo Yii::$app->homeUrl.'nomencladores' ?>">
            Nomencladores</a>
        
    </h4>
    <div class="clearfix"></div>
</div>
				<div class="Nomencladores-default-index">
					<h1>Nomencladores</h1>
					<div class="tiles">

					<a href="<?= Yii::$app->homeUrl?>nomencladores/categoriacientifica">
						<div class="tile bg-yellow-gold">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Categoriacientifica
								</div>
								<div class="number">
									<?= count(backend\modules\nomencladores\models\Categoriacientifica::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					<a href="<?= Yii::$app->homeUrl?>nomencladores/clasificacion">
						<div class="tile bg-blue-steel">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Clasificacion
								</div>
								<div class="number">
									<?= count(backend\modules\nomencladores\models\Clasificacion::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					</div>				</div>
