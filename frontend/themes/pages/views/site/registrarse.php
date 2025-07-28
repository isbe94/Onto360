<div class="page-content-wrapper ">
    <div class="register-container full-height sm-p-t-30">
        <div class="container-sm-height full-height">
            <div class="row row-sm-height">
                <div class="login-container bg-white">
                    <div class="p-l-40 m-l-10 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-10 sm-p-r-25 sm-p-t-30 col-lg-15">
                        <h1 align="center"><strong>Registrarse</strong></h1>
                        <form id="form-register" class="p-t-15"  action="<?= Yii::$app->homeUrl?>site/registrarse" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_onto_CSRF_frontend"
                                   value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Nombre</label>
                                    <div class="form-group form-group-default">
                                        <input type="text" name="Usuario[nombre]" placeholder="Nombre" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Primer Apellido</label>
                                    <div class="form-group form-group-default">
                                        <input type="text" name="Usuario[apellido1]" placeholder="Primer Apellido"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Segundo Apellido</label>
                                    <div class="form-group form-group-default">
                                        <input type="text" name="Usuario[apellido2]" placeholder="Segundo Apellido"
                                               class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Usuario</label>
                                    <div class="form-group form-group-default">
                                        <input type="text" name="Usuario[usuario]" placeholder="Usuario" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Contraseña</label>
                                    <div class="form-group form-group-default">
                                        <input type="password" name="Usuario[contrasena]" placeholder="Contraseña"
                                               class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Correo</label>
                                    <div class="form-group form-group-default">
                                        <input type="email" name="Usuario[correo]" placeholder="Correo" class="form-control"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Categoría Científica</label>
                                    <div>
                                        <select class="form-control" style="width: 280px;"
                                                placeholder="Escoja la Categoría Científica..." required
                                                id="id_catcientifica_combo" name="Usuario[id_catcientifica]"
                                                onkeypress="return permite(event,'car')">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Foto</label>
                                    <div class="form-group">
                                        <div class="col-md-12 pull-right">
                                            <div class="col-md-6">
                                                <input class="" value=""
                                                       placeholder="Seleccionar avatar" type="file" id="foto"
                                                       name="Usuario[avatar]" "></input>

                                            </div>
                                            <div class="col-md-6">
                                                <img width="70px" height="70px" style="margin-top: 20px"
                                                     class="user-image img-circle pull-right" id="image_autor"
                                                     src="<?php echo Yii::$app->getHomeUrl() . Yii::$app->params['usuario_image_path'] . 'user.jpg' ?> "/>
                                            </div>

                                        </div>

                                        <input value="-1" type="hidden" id="idusuario">
                                    </div>
                                </div>
                            </div>
                            <div align="center">
                                <button class="btn btn-primary btn-cons m-t-10" type="submit">Crear cuenta</button>
                            </div>
                            <br>
                            <br>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


