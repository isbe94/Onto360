<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\themes\make\AppAssetMake;
use backend\modules\seguridad\models\Usuario;
use yii\helpers\Html;

AppAssetMake::register($this);
$condition = array('idusuario' => Yii::$app->getUser()->identity->idusuario);
$user = Usuario::findOne($condition);
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
            var urlhome = '<?php echo Yii::$app->homeUrl ?>';
            var _csrf = '<?php echo Yii::$app->getRequest()->csrfToken ?>';
        </script>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
    <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
    <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
    <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
    <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
    <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
    <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
    <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
    <?php $this->beginBody() ?>
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
        your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar">
            <div class="logopanel">
                <h1>
                    <a href="<?php Yii::$app->getHomeUrl() ?>"></a>
                </h1>
            </div>
            <div class="sidebar-inner">
                <div class="sidebar-top">
                    <form action="search-result.html" method="post" class="searchform" id="search-results">
                        <input type="text" class="form-control" name="keyword" placeholder="Buscar...">
                    </form>
                    <div class="userlogged clearfix">
                        <!--                    <i class="icon icons-faces-users-01"></i>-->
                        <img src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $user->avatar ?>"
                             class="pull-left" width="30%" alt="user image"
                             style="border-radius:50%;margin-bottom: 10px;margin-right: 10px;">

                        <div class="user-details">
                            <h4><?= $user->usuario ?></h4>

                            <div class="dropdown user-login">
                                <button class="btn btn-xs dropdown-toggle btn-rounded" type="button"
                                        data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
                                        data-delay="300">
                                    <i class="online"></i><span>Available</span><i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="busy"></i><span>Busy</span></a></li>
                                    <li><a href="#"><i class="turquoise"></i><span>Invisible</span></a></li>
                                    <li><a href="#"><i class="away"></i><span>Away</span></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="menu-title">
                    Navegación
                    <div class="pull-right menu-settings">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true" data-delay="300">
                            <i class="icon-settings"></i>
                        </a>

                    </div>
                </div>
                <ul class="nav nav-sidebar">
                    <li class=" nav-active active"><a href="<?php echo Yii::$app->homeUrl?>"><i class="icon-home"></i><span
                                data-translate="dashboard">Inicio</span></a>
                    </li>
                    <li class="nav-parent">
                        <a href="#"><i class="icon-puzzle"></i><span>Nomencladores</span> <span
                                class="fa arrow active"></span></a>
                        <ul class="children collapse" style="display: block;">
                            <li><a href="<?php echo Yii::$app->homeUrl ?>nomencladores/categoriacientifica"><span
                                        data-translate=""> Categoría Científica</span></a></li>
                            <li><a href="<?php echo Yii::$app->homeUrl ?>nomencladores/clasificacion"><span
                                        data-translate=""> Clasificación</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a href="#"><i class="icon-layers"></i><span>Gestión</span> <span
                                class="fa arrow active"></span></a>
                        <ul class="children collapse" style="display: block;">
                            <li><a href="<?php echo Yii::$app->homeUrl ?>gestion/ontologia"><span
                                        data-translate=""></span>Ontología</a></li>
                            <li><a href="<?php echo Yii::$app->homeUrl ?>gestion/clasificacion_ontologia"><span
                                        data-translate=""></span>Clasificación Ontología</a></li>
                            <li><a href="<?php echo Yii::$app->homeUrl ?>gestion/tecnologia"><span
                                        data-translate=""></span>Tecnología</a></li>
                            <li><a href="<?php echo Yii::$app->homeUrl ?>gestion/lenguaje"><span
                                        data-translate=""></span>Lenguaje</a></li>
                            <li><a
                                    href="<?php echo Yii::$app->homeUrl ?>gestion/experticia"><span
                                        data-translate="">Experticia</span></a></li>
                            <li><a
                                    href="<?php echo Yii::$app->homeUrl ?>gestion/comentario"><span
                                        data-translate="">Comentario</span></a></li>

                            <li><a
                                    href="<?php echo Yii::$app->homeUrl ?>gestion/pregunta"><span
                                        data-translate="">Pregunta</span></a></li>
                            <li><a
                                    href="<?php echo Yii::$app->homeUrl ?>gestion/respuesta"><span
                                        data-translate="">Respuesta</span></a></li>

                            <li><a
                                    href="<?php echo Yii::$app->homeUrl ?>gestion/pregunta_respuestas"><span
                                        data-translate=""></span>Pregunta_respuestas</a></li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a href="#"><i class="icon-shield"></i><span>Seguridad</span> <span
                                class="fa arrow active"></span></a>
                        <ul class="children collapse" style="display: block;">
                            <li><a
                                    href="<?php echo Yii::$app->homeUrl ?>seguridad/usuario"><span
                                        data-translate="">Usuario</span></a></li>
                            <li><a
                                    href="<?php echo Yii::$app->homeUrl ?>seguridad/rol"><span
                                        data-translate="item_menu_role">Rol</span></a></li>

                            <ul class="children collapse">
                                <li class="nav-parent"><a
                                        href="<?php echo Yii::$app->homeUrl ?>security/permission_role"><span
                                            data-translate=""></span></a></li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- SIDEBAR WIDGET FOLDERS -->
                <div class="sidebar-footer clearfix">
                    <a class="pull-left btn-effect buttonlogout" style="cursor: hand" data-modal="modal-1"
                       data-rel="tooltip" data-placement="top" data-original-title="Salir">
                        <i class="icon-power"></i></a>
                </div>
            </div>
        </div>
        <!-- END SIDEBAR -->
        <div class="main-content">
            <!-- BEGIN TOPBAR -->

            <div class="topbar">
                <div class="header-left">
                    <div class="topnav">
                        <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                        <ul class="nav nav-icons">

                        </ul>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="header-menu nav navbar-nav">
                        <!-- BEGIN USER DROPDOWN -->

                        <!-- END USER DROPDOWN -->
                        <!-- BEGIN NOTIFICATION DROPDOWN -->

                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN MESSAGES DROPDOWN -->

                        <!-- END MESSAGES DROPDOWN -->
                        <!-- BEGIN USER DROPDOWN -->
                        <li class="dropdown" id="user-header">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img
                                    src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $user->avatar ?>"
                                    alt="user image">
                                <span class="username">Bienvenido <?= $user->usuario ?></span>
                            </a>
                            <ul class="dropdown-menu">
<!--                                <li>-->
<!--                                    <a href="#"><i class="icon-user"></i><span>Mi Perfil</span></a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="#"><i class="icon-calendar"></i><span>My Calendar</span></a>-->
<!--                                </li>-->
                                <li>
                                    <a href="<?php echo Yii::$app->homeUrl?>site/cambio_contrasena"><i class="icon-settings"></i><span>Cambiar contraseña</span></a>
                                </li>
                                <li>
                                    <a class="buttonlogout"><i class="icon-logout"></i><span>Salir</span></a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER DROPDOWN -->
                        <!-- CHAT BAR ICON -->
                       
                    </ul>
                </div>
                <!-- header-right -->
            </div>


            <!-- END TOPBAR -->
            <!-- BEGIN PAGE CONTENT -->
            <div class="page-content page-thin">
                <div>
                    <?php echo $content ?>
                </div>
                <div class="footer pull-bottom">
                    <div class="copyright">
                        <p class="pull-left sm-pull-reset">
                            <span>Copyright <span class="copyright">©</span> 2017 </span>
                            <span>All rights reserved. </span>
                        </p>

                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END MAIN CONTENT -->
        <!-- BEGIN BUILDER -->
        <!-- END BUILDER -->
    </section>

    <!-- BEGIN SEARCH -->
    <div id="morphsearch" class="morphsearch">
        <form class="morphsearch-form">
            <input class="morphsearch-input" type="search" placeholder="Buscar..."/>
            <button class="morphsearch-submit" type="submit">Buscar</button>
        </form>
        <div class="morphsearch-content withScroll">
            <div class="dummy-column user-column">
                <h2>Administradores</h2>
                <div id="usersearchadmin">

                </div>
            </div>

        </div>
        <!-- /morphsearch-content -->
        <span class="morphsearch-close"></span>
    </div>

    <!-- END SEARCH -->

    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>

    <form method="post" id="form_logout" action="<?php echo Yii::$app->homeUrl ?>site/logout">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
               value="<?= Yii::$app->request->getCsrfToken() ?>"/>
    </form>
    <form method="post" id="form_change_pass" action="<?php echo Yii::$app->homeUrl ?>seguridad/usuario/change_pass">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
               value="<?= Yii::$app->request->getCsrfToken() ?>"/>
    </form>
    <!-- END PAGE SCRIPT -->
    <?php $this->endBody() ?>

    </body>

    <!-- END BODY -->
    </html>
<?php $this->endPage() ?>