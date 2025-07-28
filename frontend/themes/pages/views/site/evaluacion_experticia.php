<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-12">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Evaluar Experticia de Usuario
                    </div>
                </div>
                <div class="panel-body">
                    <h5>A través de este cuestionario podrás evaluarte según el nivel de experticia que poseas.En cada pregunta selecciona la opción que consideres correcta.</h5>
                </div>
            </div>
            <!-- END PANEL -->
        </div>
    </div>
</div>
<div class="container-fluid container-fixed-lg bg-white">
    <div class="panel panel-transparent">
        <div class="panel-body">
            <?php $preguntas=array();
            $lista_preguntas=null;
            ?>
            <?php if($mensaje!=null) {?>
                <div class="panel panel-notif">
                    <div class="panel-content">
                        <h4><?= $mensaje?></h4>
                    </div>
                    <br>
                    <a class="btn btn-lg btn-rounded btn-primary m-r-20 m-b-10" href="<?php echo Yii::$app->homeUrl?>">Salir</a>
                </div>
            <?php }?>
            <?php if($mensaje==null ) {?>
                <form id="evaluacion_experticia"  method="post" action="<?php echo Yii::$app->homeUrl?>site/evaluar_experticia" >
                    <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
                    <div class="row">
                        <?php $cantidad=1 ?>
                        <?php shuffle($pregunta_respuestas);
                        $cant_element_array=count($pregunta_respuestas);
                        if ($cant_element_array <6){
                            $list_pregunta_respuestas=$pregunta_respuestas;
                        }elseif($cant_element_array >6){
                            $list=array_chunk($pregunta_respuestas,6);
                            $list_pregunta_respuestas=array_shift($list);
                        }else{
                            $list_pregunta_respuestas=$pregunta_respuestas;
                        }
                        ?>
                        <?php foreach ($list_pregunta_respuestas as $cuest){?>
                            <div class="col-md-12">
                                <div class="panel panel-transparent">
                                    <div class="panel-heading no-padding">
                                        <div class="panel-title">
                                            Pregunta <?= $cantidad?>
                                        </div>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <?php $c=(object)$cuest ?>
                                        <p>
                                            <?php echo $c->pregunta?>
                                        </p>
                                        <?php $respuesta=explode(',',$c->resp_array)?>
                                        <?php foreach ($respuesta as $resp){?>
                                            <?php $r=\backend\modules\gestion\models\Respuesta::find()->where(['idrespuesta' => $resp])->one()?>
                                            <?php $r_c=\backend\modules\gestion\models\pregunta_respuestas::find()->where(['id_respuesta' => $r->idrespuesta])->andWhere(['id_pregunta' => $c->idpregunta])->one()?>
                                            <div class="row">
                                                <input name="Respuesta<?= $cantidad?>" type="radio"  value="<?php echo $r_c->resp_correcta?>">
                                                <label><?php echo $r->respuesta?></label>
                                                <br>
                                            </div>
                                        <?php }?>
                                        <?php $cantidad = $cantidad + 1 ?>
                                    </div>
                                </div>
                            </div>
                            <br style="line-break: normal">
                            <?php array_push($preguntas,$r_c->id_pregunta) ?>
                        <?php }?>
                        <?php
                            $lista_preguntas=implode(',',$preguntas);
                        ?>
                        <button class="btn btn-lg btn-rounded btn-primary m-r-20 m-b-10">Evaluar</button>
                    </div>
                    <input value="<?= $lista_preguntas ?>" type="hidden" name="preguntas">
                </form>
            <?php }?>
        </div>
    </div>
</div>
