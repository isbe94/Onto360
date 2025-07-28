<div class="container-fluid container-fixed-lg bg-white">
    <!-- START PANEL -->
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title">Mis perfiles ontológicos
            </div>
            <div class="export-options-container pull-right"></div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <table class="table table-striped" id="tableWithExportOptions">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dominio</th>
                    <th>Fichero <i class="fs-14 pg-download"></i></th>
                    <th>Clasificación</th>
                    <th>Versión</th>
                    <th>Lenguaje</th>
                    <th>Namespace</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ((object)$lista_mis_perfiles as $p)
                {
                    $mis_perfiles=(object)$p ?>
                    <?php $lenguaje=\backend\modules\gestion\models\Lenguaje::find()->where('idlenguaje' == $mis_perfiles->id_lenguaje)->one()?>
                    <form id="#form_onto_perfil"  method="post" action="<?php echo Yii::$app->homeUrl. 'site/form_actualizar_onto_perfil?idontologia='.$mis_perfiles->idontologia?>">
                        <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
                        <tr class="odd gradeX">
                            <td><?= $mis_perfiles->nombre?></td>
                            <td><?= $mis_perfiles->dominio?></td>
                            <td><a target="_blank" href="<?php echo Yii::$app->params['url_onto'].$mis_perfiles->fichero?>" download="<?php echo $mis_perfiles->fichero?>"><?= $mis_perfiles->fichero?></a></td>
                            <td><?= $mis_perfiles->clasif_array?></td>
                            <?php if ($mis_perfiles->version==null){?>
                                <td class="v-align-middle">-</td>
                            <?php }else {?>
                                <td class="v-align-middle"><?php echo $mis_perfiles->version?></td>
                            <?php }?>
                            <?php if ($lenguaje->lenguaje==null){?>
                                <td class="v-align-middle">-</td>
                            <?php }else {?>
                                <td class="v-align-middle"><?php echo $lenguaje->lenguaje?></td>
                            <?php }?>
                            <?php if ($mis_perfiles->name_space==null){?>
                                <td class="v-align-middle">-</td>
                            <?php }else {?>
                                <td class="v-align-middle"><?php echo $mis_perfiles->name_space?></td>
                            <?php }?>

                            <td><a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/foro?idontologia='.$mis_perfiles->idontologia?>" title="Comentar"><i class="fs-14 pg-comment"></i></a>
                            <button class="btn btn-tag   btn-tag-dark btn-tag-rounded" title="Actualizar Ontología"><i class="fs-14 sl-list"></i></button>
                            <a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/visualizar?idontologia='.$mis_perfiles->idontologia?>" title="Visualizar"><i class="fs-14 pg-search"></i></a>
                            </td>
                        </tr>
                    </form>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END PANEL -->
</div>