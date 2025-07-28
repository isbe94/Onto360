<div class="panel panel-transparent">
    <div class="panel-heading">
        <div class="panel-title"><strong>Listado de Ontologías</strong></div>
    </div>
    <?php if (Yii::$app->getUser()->identity !=null){ ?>
        <div class="panel-body">
            <div class="table-responsive">
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
                        <th style="color: indianred">ACCIONES</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($lista_clasif)>0 && $lista_clasif!=false && count($lista_clasif_busc) ==0 && $error==""){?>
                        <?php foreach($lista_clasif as $d){?>
                            <?php $dato=(object)$d ?>
                            <?php $lenguaje=\backend\modules\gestion\models\Lenguaje::find()->where('idlenguaje' == $dato->id_lenguaje)->one()?>
                            <form id="#form_onto_perfil"  method="post" action="<?php echo Yii::$app->homeUrl. 'site/form_actualizar_onto_perfil?idontologia='.$dato->idontologia?>">
                                <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
                                <tr>
                                    <td><?php echo $dato->nombre?></td>
                                    <td ><?php echo $dato->dominio?></td>
                                    <td ><a target="_blank" href="<?php echo Yii::$app->params['url_onto'].$dato->fichero?>" download="<?php echo $dato->fichero?>"><i class="fs-14 pg-download"></i> <?= $dato->fichero?></a></td>
                                    <?php ?>
                                    <?php if (array_key_exists('clasif_array',$d)==false){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $dato->clasif_array ?></td>
                                    <?php }?>
                                    <?php if ($dato->version==null){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $dato->version?></td>
                                    <?php }?>
                                    <?php if ($lenguaje->lenguaje==null){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $lenguaje->lenguaje?></td>
                                    <?php }?>
                                    <?php if ($dato->name_space==null){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $dato->name_space?></td>
                                    <?php }?>
                                    <td ><a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/foro_onto?idontologia='.$dato->idontologia?>" title="Comentar"><i class="fs-14 pg-comment"></i></a>
                                        <a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/visualizar?idontologia='.$dato->idontologia?>" title="Visualizar"><i class="fs-14 pg-search"></i></a>
                                        <?php if ($dato->id_usuario == Yii::$app->getUser()->identity->getId()){?>
                                        <button class="btn btn-tag   btn-tag-dark btn-tag-rounded" type="submit" title="Actualizar Ontología"><i class="fs-14 sl-list"></i></button>
                                    </td>
                                <?php }?>
                            </form>
                            </tr>
                        <?php }?>

                    <?php }elseif (count($lista_clasif) ==0 && count($lista_clasif_busc)>0 && $error=="") {?>
                        <?php foreach($lista_clasif_busc as $l){?>
                            <?php $l_clasif=(object)$l?>
                            <?php $lenguaje=\backend\modules\gestion\models\Lenguaje::find()->where('idlenguaje' == $l_clasif->id_lenguaje)->one()?>
                            <form id="#form_onto_perfil"  method="post" action="<?php echo Yii::$app->homeUrl. 'site/form_actualizar_onto_perfil?idontologia='.$l_clasif->idontologia?>">
                                <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
                                <tr>
                                    <td ><?php echo $l_clasif->nombre?></td>
                                    <td ><?php echo $l_clasif->dominio?></td>
                                    <td ><a target="_blank" href="<?php echo Yii::$app->params['url_onto'].$l_clasif->fichero?>" download="<?php echo $l_clasif->fichero?>"><?= $l_clasif->fichero?></a></td>
                                    <?php if (array_key_exists('clasif_array',$l)==false){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $l_clasif->clasif_array ?></td>
                                    <?php }?>
                                    <?php if ($l_clasif->version==null){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $l_clasif->version?></td>
                                    <?php }?>
                                    <?php if ($lenguaje->lenguaje==null){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $lenguaje->lenguaje?></td>
                                    <?php }?>
                                    <?php if ($l_clasif->name_space==null){?>
                                        <td >-</td>
                                    <?php }else {?>
                                        <td ><?php echo $l_clasif->name_space?></td>
                                    <?php }?>
                                    <td><a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/foro_onto?idontologia='.$l_clasif->idontologia?>" title="Comentar"><i class="fs-14 pg-comment"></i></a>
                                        <a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/visualizar?idontologia='.$l_clasif->idontologia?>" title="Visualizar"><i class="fs-14 pg-search"></i></a>
                                        <?php if ($l_clasif->id_usuario == Yii::$app->getUser()->identity->getId()){?>
                                            <button class="btn btn-tag   btn-tag-dark btn-tag-rounded" type="submit" title="Actualizar Ontología"><i class="fs-14 sl-list"></i></button>
                                        <?php }?>
                                    </td>
                            </form>
                            </tr>
                        <?php }?>
                    <?php } elseif (count($lista_clasif) ==0 && count($lista_clasif_busc)==0) {?>

                        <div class="panel-heading">
                            <h2><?php echo $error ?></h2>
                        </div>

                    <?php }?>
                    </tbody>
                </table>

            </div>
        </div>
    <?php }else{?>
        <div class="table-responsive">
            <table class="table table-striped" id="tableWithExportOptions">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dominio</th>
                    <th>Clasificación</th>
                    <th>Versión</th>
                    <th>Lenguaje</th>
                    <th>Namespace</th>
                    <th style="color: indianred">ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($lista_clasif) ==0 && count($lista_clasif_busc)>0 && $error=="") {?>
                    <?php foreach($lista_clasif_busc as $l){?>
                        <?php $l_clasif=(object)$l?>
                        <tr>
                            <td ><?php echo $l_clasif->nombre?></td>
                            <td ><?php echo $l_clasif->dominio?></td>
                            <?php if (count($l)==9){?>
                                <td >-</td>
                            <?php }else {?>
                                <td ><?php echo $l_clasif->clasif_array ?></td>
                            <?php }?>
                            <?php if ($l_clasif->version==null){?>
                                <td >-</td>
                            <?php }else {?>
                                <td ><?php echo $l_clasif->version?></td>
                            <?php }?>
                            <?php if ($l_clasif->lenguaje==null){?>
                                <td >-</td>
                            <?php }else {?>
                                <td ><?php echo $l_clasif->lenguaje?></td>
                            <?php }?>
                            <?php if ($l_clasif->name_space==null){?>
                                <td >-</td>
                            <?php }else {?>
                                <td ><?php echo $l_clasif->name_space?></td>
                            <?php }?>
                            <td >
                                <a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/visualizar?idontologia='.$l_clasif->idontologia?>" title="Visualizar"><i class="fs-14 pg-search"></i></a>
                            </td>
                        </tr>

                    <?php }?>
                <?php } elseif (count($lista_clasif) ==0 && count($lista_clasif_busc)==0) {?>

                    <div class="panel-heading">
                        <h2><?php echo $error ?></h2>
                    </div>

                <?php }?>
                </tbody>
            </table>
        </div>
    <?php }?>
</div>