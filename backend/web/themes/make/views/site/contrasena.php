
<div class="page-content col-lg-8" >
    <div class="header">
        <h2>Cambiar  <strong> Contraseña</strong></h2>
    </div>

    <form class="form-password" role="form" action="<?php echo Yii::$app->homeUrl?>site/cambio_contrasena" method="post">
        <input type="hidden" name="_onto_CSRF"
               value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>

        <div class="append-icon m-b-20">
            <input type="password" name="Usuario[contrasena]" class="form-control form-white password" placeholder="Contrasena Actual" required>
            <i class="icon-lock"></i>
        </div> <div class="append-icon m-b-20">
            <input type="password" name="contrasena_nueva" class="form-control form-white password" placeholder="Nueva Contraseña" required>
            <i class="icon-lock"></i>
        </div>
        <div class="append-icon m-b-20">
            <input type="password" name="contrasena_verific" class="form-control form-white password" placeholder="Repetir Nueva Contraseña" required>
            <i class="icon-lock"></i>
        </div>
        <div class="append-icon m-b-20">
            <input type="email" name="Usuario[correo]" class="form-control form-white password" placeholder="Correo Electrónico" required>
            <i class="icon-lock"></i>
        </div>
        <div class="append-icon m-b-20" align="center">
            <button type="submit" id="submit-password"  class="btn btn-primary btn-embossed">Aceptar</button>
            <a type="button" class="btn btn-success btn-embossed" href="<?php echo Yii::$app->homeUrl?>">Cerrar</a>
        </div>
        
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