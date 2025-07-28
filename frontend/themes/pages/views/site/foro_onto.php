<?php $usuario= Yii::$app->getUser()->identity?>
<div class="content ">
    <div class="container-fluid sm-p-l-5 bg-master-lighter ">
        <div class="timeline-container top-circle">
            <section class="timeline">
                <div class="timeline-block">
                    <div class="timeline-point warning">
                        <i class="pg-social"></i>
                    </div>
                    <!-- timeline-point -->
                    <div class="timeline-content">
                        <div class="card share full-width ">
                            <div class="card-header clearfix">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5><span class="semi-bold"><?= $usuario->nombre ?></span>
                                            <span class="text-master"><?= $usuario->apellido1 ?></span>
                                            <span class="text-master"><?php echo $usuario->apellido2 ?></span></h5>
                                        <h5 class="text-warning-dark pull-left fs-12">Comenta tu experiencia sobre el uso de las Ontologías </h5>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="pull-right small hint-text">
                                            <div class="thumbnail-wrapper d48 circular bordered b-white">
                                                <img alt="" width="50" height="50" data-src-retina="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario->avatar ?>"
                                                     data-src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario->avatar ?>"
                                                     src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario->avatar ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-description">
                                <form id="form_comentar_onto"  method="post" action="<?php echo Yii::$app->homeUrl?>site/comentar_foro_onto" >
                                    <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
                                    <div class="form-group">
                                        <h5>Comenta sobre: Ontología "<?php echo $ontologia->nombre?>"</h5>
                                    </div>

                                    <input type="hidden" name="idontologia" value="<?= $ontologia->idontologia?>">
                                    <textarea class="form-control" id="name" name="comentario"  placeholder="Comenta tu experiencia"></textarea>
                                    <br>
                                    <button class="btn btn-success" type="submit" style="left: 75%">Comentar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- timeline-content -->
                </div>
                <!-- timeline-block -->
                <?php $coment_onto=\backend\modules\gestion\models\Comentario::find()->where("id_ontologia=" . $ontologia->idontologia)->all()?>
                <?php if (count($coment_onto)!=0){?>
                    <?php foreach ($comentarios as $coment){?>
                        <?php $usuario_coment=\backend\modules\seguridad\models\Usuario::find()->where("idusuario=" . $coment->id_usuario)->one()?>
                        <?php $experticia=\backend\modules\gestion\models\Experticia::find()->where("idexperticia=" . $usuario_coment->id_experticia)->one()?>
                        <div class="timeline-block">
                            <div class="timeline-point small">
                            </div>
                            <!-- timeline-point -->
                            <div class="timeline-content">
                                <div class="card share full-width ">
                                    <div class="card-header clearfix">
                                        <div class="user-pic">
                                            <img alt="Profile Image" width="33" height="33" data-src-retina="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario_coment->avatar ?>" data-src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario_coment->avatar ?>" src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario_coment->avatar ?>">
                                        </div>
                                        <h5 style="color: dimgrey"><strong>Tema:</strong> Ontología "<?php echo $ontologia->nombre?>"</h5>
                                        <br>
                                        <h5 style="color: deepskyblue"><?= $usuario_coment->usuario ?></h5>
                                        <?php if ($experticia->idexperticia==4){?>
                                            <h5><span class="text-master" style="right: 100%">Nivel de Experticia</span>
                                                <span class="text-master"><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h5>
                                        <?php }elseif($experticia->idexperticia==2){?>
                                            <h5><span class="text-master" style="right: 100%">Nivel de Experticia</span>
                                                <span class="text-master"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h5>
                                        <?php }elseif($experticia->idexperticia==3){?>
                                            <h5><span class="text-master" style="right: 100%">Nivel de Experticia</span>
                                                <span class="text-master"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h5>
                                        <?php }elseif($experticia->idexperticia==6){?>
                                            <h5><span class="text-master" style="right: 100%">Nivel de Experticia</span>
                                                <span class="text-master"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h5>
                                        <?php }else{?>
                                            <h5><span class="text-master" style="right: 100%">Nivel de Experticia</span>
                                                <span class="text-master"><i class="fa fa-star"></i></span></h5>
                                        <?php }?>
                                    </div>
                                    <div class="card-description">
                                        <p><?php echo $coment->comentario?></p>
                                    </div>
                                </div>
                                <div class="event-date">
                                    <strong class="fs-12 hint-text"><?php echo $coment->fecha?> </strong>
                                </div>
                            </div>
                            <!-- timeline-content -->
                        </div>
                    <?php }?>
                <?php }?>
            </section>
            <!-- timeline -->
        </div>
        <!-- -->
    </div>
    <!-- END CONTAINER FLUID -->
</div>

