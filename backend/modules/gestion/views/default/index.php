
<?php $this->title = 'Gestion';?>

<div class="x_title">
    <h4>
        <i class="fa fa-home" style="font-size:30px">
        </i>
        <a href="<?php echo Yii::$app->homeUrl?>">
            Inicio
        </a>
        /

        <a href="<?php echo Yii::$app->homeUrl.'gestion' ?>">
            Gestion</a>
        
    </h4>
    <div class="clearfix"></div>
</div>
				<div class="Gestion-default-index">
					<h1>Gestion</h1>
					<div class="tiles">

					<a href="<?= Yii::$app->homeUrl?>gestion/comentario">
						<div class="tile bg-yellow-saffron">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Comentario
								</div>
								<div class="number">
									<?= count(backend\modules\gestion\models\Comentario::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					<a href="<?= Yii::$app->homeUrl?>gestion/pregunta_respuestas">
						<div class="tile bg-blue-steel">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									pregunta_respuestas
								</div>
								<div class="number">
									<?= count(backend\modules\gestion\models\pregunta_respuestas::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					<a href="<?= Yii::$app->homeUrl?>gestion/experticia">
						<div class="tile bg-grey-silver">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Experticia
								</div>
								<div class="number">
									<?= count(backend\modules\gestion\models\Experticia::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					<a href="<?= Yii::$app->homeUrl?>gestion/ontologia">
						<div class="tile bg-yellow">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Ontologia
								</div>
								<div class="number">
									<?= count(backend\modules\gestion\models\Ontologia::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					<a href="<?= Yii::$app->homeUrl?>gestion/respuesta">
						<div class="tile bg-green">
							<div class="tile-body">
								<i class="fa fa-bell-o"></i>
							</div>
							<div class="tile-object">
								<div class="name">
									Respuesta
								</div>
								<div class="number">
									<?= count(backend\modules\gestion\models\Respuesta::find()->all())?>
								</div>
							</div>
						</div>
					</a>
					</div>				</div>
