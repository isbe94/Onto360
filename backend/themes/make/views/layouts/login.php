<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\themes\make\AppAssetMakeLogin;
use yii\helpers\Html;

AppAssetMakeLogin::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en" class="no-js">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= $this->title ?></title>
        <?php $this->head() ?>
        <link rel="shortcut icon" href="favicon.ico"/>
        <script>
            var urlhome='<?php echo Yii::$app->homeUrl ?>';
            var _csrf='<?php echo Yii::$app->getRequest()->csrfToken ?>';
        </script>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->

    <body class="account2" data-page="login">
   <?php $this->beginBody()?>
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <i class="user-img icons-faces-users-03"></i>
        <div class="account-info">
            <a href="dashboard.html" class="logo">
                <!-- <img src="/themes/make/assets/images/logo/logo-white.png"> -->
            </a>
            <ul>
                <br>
                <br>
                <li><i class="icon-magic-wand"></i>Administración</li>
            </ul>
        </div>
        <?php echo $content?>

    </div>
    <!-- END LOCKSCREEN BOX -->
    <p class="account-copyright">
        <span>Copyright © 2017 </span>.<span>All rights reserved.</span>
    </p>
   <?php $this->endBody()?>
    </body>
    <!-- END BODY -->
    </html>
<?php $this->endPage() ?>