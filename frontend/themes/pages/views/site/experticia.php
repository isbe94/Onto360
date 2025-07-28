<div class="container-fluid container-fixed-lg bg-white">
    <!-- START PANEL -->
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title">Usuarios Evaluados
            </div>
            <div class="export-options-container pull-right"></div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <table class="table table-striped" id="tableWithExportOptions">
                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Grado Experiencia</th>
                    <th style="color: indianred">Evaluación</th>


                </tr>
                </thead>
                <tbody>
                <?php foreach ($usuario_experto as $u)
                {
                    $usuario=(object)$u ?>
                    <tr class="odd gradeX">
                        <td><img width="30px" height="30px"
                                 class="user-image img-circle " id="image_autor"
                                 src="<?php echo Yii::$app->getHomeUrl() . Yii::$app->params['usuario_image_path'] . $usuario->avatar ?> "/>  <?= $usuario->usuario?></td>
                        <td><?= $usuario->correo?></td>
                        <td><?= $usuario->grado_experiencia?></td>
                        <?php if ($usuario->grado_experiencia=="Bajo"){?>
                            <td><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                        <?php }elseif($usuario->grado_experiencia=="Medio"){?>
                            <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                        <?php }elseif($usuario->grado_experiencia=="Alto"){?>
                            <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                        <?php }else{?>
                            <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                        <?php }?>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>