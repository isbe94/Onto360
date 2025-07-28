<div class="login-container bg-white">
    <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <img src="<?= Yii::$app->homeUrl.Yii::$app->view->theme->baseUrl ?>/assets/img/onto360.png" alt="logo" data-src="<?= Yii::$app->homeUrl.Yii::$app->view->theme->baseUrl ?>/assets/img/onto360.png"
             data-src-retina="<?= Yii::$app->homeUrl.Yii::$app->view->theme->baseUrl ?>/assets/img/onto360.png" width="220" height="80">
        <p class="p-t-35">Introduzca sus credenciales</p>
        <!-- START Login Form -->

       
        <form id="form-login" class="p-t-15" role="form" action="<?php echo Yii::$app->homeUrl ?>site/login" method="post">
            <input type="hidden" name="_onto_CSRF_frontend"
                   value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>
            <!-- START Form Control-->
            <div class="form-group form-group-default">
                <label>Usuario</label>
                <div class="controls">
                    <input type="text" name="LoginForm[username]" id="name"  placeholder="Usuario" class="form-control" required>
                </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default">
                <label>Contraseña</label>
                <div class="controls">
                    <input type="password" class="form-control" name="LoginForm[password]" placeholder="Credentials"
                           required>
                </div>
            </div>
            <!-- START Form Control-->
            <!--            <div class="row">-->
            <!--                <div class="col-md-6 no-padding">-->
            <!--                    <div class="checkbox ">-->
            <!--                        <input type="checkbox" value="1" id="checkbox1">-->
            <!--                        <label for="checkbox1">Keep Me Signed in</label>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 text-right">-->
            <!--                    <a href="#" class="text-info small">Help? Contact Support</a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!-- END Form Control-->
            <button class="btn btn-primary btn-cons m-t-10" type="submit">Autenticarse</button>
            <a type="button" class="btn btn-success btn-embossed m-t-10" href="<?php echo Yii::$app->homeUrl?>">Cerrar</a>

        </form>

        <div id="basic-preview" class="preview active" style="display: block;width: 439px!important;" >
            <?php if ($error!='') { ?>
                <div class="alert media fade in alert-danger">
                    <p><strong>Error! </strong><?= $error ?></p>
                </div>
            <?php } ?>
        </div>
        <!--END Login Form-->
        <!--        <div class="pull-bottom sm-pull-bottom">-->
        <!--            <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">-->
        <!--                <div class="col-sm-3 col-md-2 no-padding">-->
        <!--                    <img alt="" class="m-t-5" data-src="--><!--/assets/img/demo/pages_icon.png"-->
        <!--                         data-src-retina="--><!--/assets/img/demo/pages_icon_2x.png" height="60"-->
        <!--                         src="--><!--/assets/img/demo/pages_icon.png" width="60">-->
        <!--                </div>-->
        <!--                <div class="col-sm-9 no-padding m-t-10">-->
        <!--                    <p>-->
        <!--                        <small>-->
        <!--                            Create a pages account. If you have a facebook account, log into it for this-->
        <!--                            process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#"-->
        <!--                                                                                                   class="text-info">Google</a>-->
        <!--                        </small>-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</div>