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
                    <th style="width:20%">Nombre</th>
                    <th style="width:20%">Dominio</th>
                    <th style="width:25%">Fichero [Descargar]</th>
                    <th style="width:25%">Clasificación</th>
                    <th style="width:15%">Versión</th>
                    <th style="width:25%">Lenguaje</th>
                    <th style="width:30%">Namespace</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ((object)$lista_mis_perfiles as $p)
                {
                    $mis_perfiles=(object)$p ?>
                    <form id="#form_onto_perfil"  method="post" action="<?php echo Yii::$app->homeUrl. 'site/form_actualizar_onto_perfil?idontologia='.$mis_perfiles->idontologia?>">
                        <input type="hidden" name="_onto_CSRF_frontend" value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
                        <tr class="odd gradeX">
                            <td><?= $mis_perfiles->nombre?></td>
                            <td><?= $mis_perfiles->dominio?></td>
                            <td><a target="_blank" href="<?php echo $mis_perfiles->fichero?>"><?= Yii::$app->homeUrl . $mis_perfiles->fichero?></a></td>
                            <td><?= $mis_perfiles->clasif_array?></td>
                            <?php if ($mis_perfiles->version==null){?>
                                <td class="v-align-middle">-</td>
                            <?php }else {?>
                                <td class="v-align-middle"><?php echo $mis_perfiles->version?></td>
                            <?php }?>
                            <?php if ($mis_perfiles->lenguaje==null){?>
                                <td class="v-align-middle">-</td>
                            <?php }else {?>
                                <td class="v-align-middle"><?php echo $mis_perfiles->lenguaje?></td>
                            <?php }?>
                            <?php if ($mis_perfiles->name_space==null){?>
                                <td class="v-align-middle">-</td>
                            <?php }else {?>
                                <td class="v-align-middle"><?php echo $mis_perfiles->name_space?></td>
                            <?php }?>

                            <td><a class="btn btn-tag   btn-tag-dark btn-tag-rounded" href="<?php echo Yii::$app->homeUrl. 'site/foro?idontologia='.$mis_perfiles->idontologia?>">Foro </a></td>
                            <td class="center"><button class="btn btn-tag   btn-tag-dark btn-tag-rounded">Actualizar</button></td>
                            <td><button class="btn btn-tag   btn-tag-dark btn-tag-rounded">Visualizar </button></td>
                        </tr>
                    </form>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END PANEL -->
</div>