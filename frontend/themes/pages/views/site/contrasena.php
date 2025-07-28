<div class="page-content-wrapper ">
    <div class="register-container full-height sm-p-t-30">
        <div class="container-sm-height full-height">
            <div class="row row-sm-height">
                <div class="login-container bg-white">
                    <div class="p-l-40 m-l-10 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-10 sm-p-r-25 sm-p-t-30 col-lg-15">
                        <h1 align="center"><strong>Cambiar Contraseña</strong></h1>
                        <br>
                        <div class="page-content">
                            <form class="form-password" role="form" action="<?php echo Yii::$app->homeUrl?>site/cambio_contrasena" method="post">
                                <input type="hidden" name="_onto_CSRF_frontend"
                                       value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>

                                <div class="row" style="">
                                    <div class="col-md-6">
                                        <label>Contraseña Actual</label>
                                        <div class="append-icon m-b-20 form-group form-group-default">
                                            <input type="password" name="Usuario[contrasena]" class="form-control form-white password" placeholder="Escribir aquí..." required>
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo Electrónico</label>
                                        <div class="append-icon m-b-20 form-group form-group-default">
                                            <input type="email" name="Usuario[correo]" class="form-control form-white password" placeholder="Escribir aquí..." required>
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="col-md-6">
                                        <label>Nueva Contraseña</label>
                                        <div class="append-icon m-b-20 form-group form-group-default">
                                            <input type="password" name="contrasena_nueva" class="form-control form-white password" placeholder="Escribir aquí..." required>
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Repetir Nueva Contraseña</label>
                                        <div class="append-icon m-b-20 form-group form-group-default">
                                            <input type="password" name="contrasena_verific" class="form-control form-white password" placeholder="Escribir aquí..." required>
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-t-15" align="center">
                                    <button class="btn btn-primary btn-cons btn-animated from-left pg" type="submit">Aceptar</button>
                                    <a type="button" class="btn btn-primary btn-cons btn-animated from-top fa " href="<?php echo Yii::$app->homeUrl?>">Cerrar</a>
                                </div>
                                <br>
                                <br>
                            </form>
                            <?php if($mensaje!=null) {?>
                                <div class="panel panel-notif">
                                    <div class="panel-content">
                                        <h4><?= $mensaje?></h4>
                                    </div>
                                </div>
                            <?php }?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

