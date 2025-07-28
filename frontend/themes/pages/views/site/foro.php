<?php $usuario= Yii::$app->getUser()->identity?>
<?php if ($usuario != null){?>
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
            <!-- START JUMBOTRON -->
            <div class="jumbotron" data-pages="parallax">
                <div class="container-fluid container-fixed-lg">
                    <div class="inner">
                        <!-- START BREADCRUMB -->
                        <ul class="breadcrumb">
                            <li>
                                <a href="<?php echo Yii::$app->homeUrl?>">Onto 360</a>
                            </li>
                            <li><a href="#" class="active">Foro</a>
                            </li>
                        </ul>
                        <!-- END BREADCRUMB -->
                    </div>
                </div>
            </div>
            <!-- END JUMBOTRON -->
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
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
                            <form id="form_foro"  method="post" action="<?php echo Yii::$app->homeUrl?>site/comentar" >
                                <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
                                <div class="form-group">
                                    <label class="control-label">Seleccione la Ontología sobre la cual desea comentar :</label>
                                    <div>
                                        <select class="form-control" style="width: 280px;" placeholder="Escoja la Ontología..." required   id="id_ontologia_combo" name="Ontologia[idontologia]" onkeypress="return permite(event,'car')" >
                                        </select>
                                    </div>
                                </div>
                                <textarea class="form-control" id="name" name="comentario"  placeholder="Comenta tu experiencia"></textarea>
                                <br>
                                <button class="btn btn-success" type="submit" style="left: 75%">Comentar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <!-- START CONTAINER FLUID -->
            <?php $collapse=1?>
            <?php foreach ($ontologia as $onto){?>
                <?php $list_comentario=\backend\modules\gestion\models\Comentario::find()->where("id_ontologia=" . $onto->idontologia)->all()?>
                <?php if (count($list_comentario)!=0){?>
                    <div class="container-fluid container-fixed-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sm-m-l-5 sm-m-r-5">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading<?=$collapse?>">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$collapse?>" aria-expanded="false" aria-controls="collapse<?=$collapse?>">
                                                        <h5 style="color: dimgrey"><strong>Tema:</strong> Ontología "<?php echo $onto->nombre?>"</h5>
                                                    </a>
                                                    <div class="col-md-8">
                                                        <form id="form_comentar"  method="post" action="<?php echo Yii::$app->homeUrl?>site/comentar" >
                                                            <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>

                                                            <textarea class="form-control" id="name" name="comentario"  placeholder="Comenta tu experiencia"></textarea>
                                                            <br>
                                                            <button class="btn btn-success" type="submit" style="left: 75%">Comentar</button>

                                                            <input value="<?= $onto->idontologia ?>" type="hidden" id="idontologia" name="idontologia">
                                                        </form>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="collapse<?=$collapse?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?=$collapse?>">
                                                <div class="content ">
                                                    <div class="container-fluid sm-p-l-5 bg-master-lighter ">
                                                        <div class="timeline-container top-circle">
                                                            <section class="timeline">
                                                                <?php $list_comentario=\backend\modules\gestion\models\Comentario::find()->where("id_ontologia=" . $onto->idontologia)->orderBy(array("fecha"=>SORT_DESC))->all()?>
                                                                <?php foreach ($list_comentario as $coment){?>
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
                                                                                    <h5 style="color: dimgrey"><strong>Tema:</strong> Ontología "<?php echo $onto->nombre?>"</h5>
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
                                                            </section>
                                                            <!-- timeline -->
                                                        </div>
                                                        <!-- -->
                                                    </div>
                                                    <!-- END CONTAINER FLUID -->
                                                </div>

                                            </div>
                                        </div>
                                        <?php $collapse=$collapse+1?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
<?php }?>


<?php if ($usuario == null ) { ?>
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
            <!-- START JUMBOTRON -->
            <div class="jumbotron" data-pages="parallax">
                <div class="container-fluid container-fixed-lg">
                    <div class="inner">
                        <!-- START BREADCRUMB -->
                        <ul class="breadcrumb">
                            <li>
                                <a href="<?php echo Yii::$app->homeUrl?>">Onto 360</a>
                            </li>
                            <li><a href="#" class="active">Foro</a>
                            </li>
                        </ul>
                        <!-- END BREADCRUMB -->
                    </div>
                </div>
            </div>
            <!-- END JUMBOTRON -->
            <!-- START CONTAINER FLUID -->
            <?php $collapse=1?>
            <?php foreach ($ontologia as $onto){?>
                <?php $list_comentario=\backend\modules\gestion\models\Comentario::find()->where("id_ontologia=" . $onto->idontologia)->all()?>
                <?php if (count($list_comentario)!=0){?>
                    <div class="container-fluid container-fixed-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sm-m-l-5 sm-m-r-5">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading<?=$collapse?>">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$collapse?>" aria-expanded="false" aria-controls="collapse<?=$collapse?>">
                                                        <h5 style="color: dimgrey"><strong>Tema:</strong> Ontología "<?php echo $onto->nombre?>"</h5>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse<?=$collapse?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?=$collapse?>">
                                                <div class="content ">
                                                    <div class="container-fluid sm-p-l-5 bg-master-lighter ">
                                                        <div class="timeline-container top-circle">
                                                            <section class="timeline">
                                                                <?php $list_comentario=\backend\modules\gestion\models\Comentario::find()->where("id_ontologia=" . $onto->idontologia)->orderBy(array("fecha"=>SORT_DESC))->all()?>
                                                                <?php foreach ($list_comentario as $coment){?>
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
                                                                                    <h5 style="color: dimgrey"><strong>Tema:</strong> Ontología "<?php echo $onto->nombre?>"</h5>
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
                                                            </section>
                                                            <!-- timeline -->
                                                        </div>
                                                        <!-- -->
                                                    </div>
                                                    <!-- END CONTAINER FLUID -->
                                                </div>

                                            </div>
                                        </div>
                                        <?php $collapse=$collapse+1?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
<?php }?>
