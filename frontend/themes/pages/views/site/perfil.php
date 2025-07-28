<div class="register-container full-height sm-p-t-30">
    <div class="container-sm-height full-height">
        <div class="row row-sm-height">
            <div class="col-sm-12 col-sm-height col-middle">
                <div class="panel panel-transparent">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed" id="condensedTable">
                                <h1 align="center"><strong>Mis Datos</strong></h1>
                                <thead>
                                <tr>
                                    <th style="width:40%">Perfil</th>
                                    <!--                        <th><button class="btn btn-primary btn-cons m-t-10" type="submit">Modificar</button></th>-->

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="v-align-middle semi-bold " ><strong>Nombre</strong></td>
                                    <td class="v-align-middle"><?php echo $perfil->nombre?></td>
                                </tr>
                                <tr>
                                    <td class="v-align-middle semi-bold"><strong>Primer Apellido</strong></td>
                                    <td class="v-align-middle "><?php echo $perfil->apellido1?></td>

                                </tr>
                                <tr>
                                    <td class="v-align-middle semi-bold"><strong>Segundo Apellido</strong></td>
                                    <td class="v-align-middle"><?php echo $perfil->apellido2?></td>

                                </tr>
                                <tr>
                                    <td class="v-align-middle semi-bold"><strong>Usuario</strong></td>
                                    <td class="v-align-middle"><?php echo $perfil->usuario?></td>

                                </tr>
                                <tr>
                                    <td class="v-align-middle semi-bold"><strong>Correo</strong></td>
                                    <td class="v-align-middle"><?php echo $perfil->correo?></td>

                                </tr>

                                <!--                    <tr>-->
                                <!--                        <td class="v-align-middle semi-bold"><strong>Contraseña</strong></td>-->
                                <!--                        <td class="v-align-middle">--><?php //echo $perfil->contrasena?><!--</td>-->
                                <!--                    </tr>-->
                                <tr>
                                    <td class="v-align-middle semi-bold"><strong>Categoría Científica</strong></td>
                                    <td class="v-align-middle"><?php echo $catcient->categcient?></td>
                                </tr>
                                <?php if ($gradoexp->grado_experiencia!='No Evaluado'){ ?>
                                <tr>
                                    <td class="v-align-middle semi-bold"><strong>Grado Experiencia</strong></td>
                                    <td class="v-align-middle"><?php echo $gradoexp->grado_experiencia?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td class="v-align-middle semi-bold"><strong>Foto</strong></td>
                                    <td class="v-align-middle"><img width="100px" height="100px"
                                                                    class="user-image img-circle pull-right" id="image_autor"
                                                                    src="<?php echo Yii::$app->getHomeUrl() . Yii::$app->params['usuario_image_path'] . $perfil->avatar ?> "/></td>

                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



