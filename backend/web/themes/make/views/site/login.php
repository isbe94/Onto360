<div class="account-form">
    <form class="form-signin" role="form" action="<?php echo Yii::$app->homeUrl ?>site/login" method="post">
        <h3><strong>Introduzca</strong> los Datos</h3>
        <div class="append-icon">
            <input type="text" name="LoginForm[username]" id="name" class="form-control form-white username"
                   placeholder="Username" required>
            <i class="icon-user"></i>
        </div>
        <div class="append-icon m-b-20">
            <input type="password" name="LoginForm[password]" class="form-control form-white password"
                   placeholder="Password" required>
            <i class="icon-lock"></i>
        </div>
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
               value="<?= Yii::$app->request->getCsrfToken() ?>"/>
        <div style="text-align: center">
            <button type="submit" class="btn btn-lg btn-dark btn-rounded ladda-button" data-style="expand-left">
                Autenticarse
            </button>
<!--            <span class="forgot-password"><a id="password" href="" >Olvido de contraseña</a></span>-->
        </div>
    </form>

    <div id="basic-preview" class="preview active" style="display: block;width: 439px!important;">
        <?php if ($error!='') { ?>
            <div class="alert media fade in alert-danger">
                <p><strong>Error! </strong><?= $error ?></p>
            </div>
        <?php } ?>
    </div>


    </div>

