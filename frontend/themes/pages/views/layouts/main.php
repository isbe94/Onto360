<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\frontend\themes\pages\AppAssetPages::register($this);
$usuario = Yii::$app->getUser()->identity;
$this->title = "ONTO 360";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no"/>
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="favicon.ico"/>
    <script>
        var urlhome = '<?php echo Yii::$app->homeUrl ?>';
        var urltheme = '<?php echo Yii::$app->homeUrl . Yii::$app->view->theme->baseUrl ?>';
        var _csrf = '<?php echo Yii::$app->getRequest()->csrfToken ?>';
    </script>
</head>
<body class="fixed-header dashboard horizontal-menu">
<div id="pageloader">
    <div class="pageloader">
        <div class="thecube">
            <div class="cube c1"></div>
            <div class="cube c2"></div>
            <div class="cube c4"></div>
            <div class="cube c3"></div>
        </div>

        <div class="textedit">
            <span class="site-name">ONTO 360</span>
            <span class="site-tagline">Portal para el trabajo con Ontologías</span>
        </div>
    </div><!-- .pageloader -->
</div><!-- #pageloader -->
<?php $this->beginBody() ?>

<!-- START PAGE-CONTAINER -->
<div class="page-container ">
    <!-- START HEADER -->
    <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
            <!-- LEFT SIDE -->
            <div class="pull-left full-height visible-sm visible-xs">
                <!-- START ACTION BAR -->
                <div class="header-inner">
                    <a href="#"
                       class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5"
                       data-toggle="sidebar">
                        <span class="icon-set menu-hambuger"></span>
                    </a>
                </div>
                <!-- END ACTION BAR -->
            </div>
            <div class="pull-center hidden-md hidden-lg">
                <div class="header-inner">
                    <div class="brand inline">
                        <img src="<?= Yii::$app->homeUrl . Yii::$app->view->theme->baseUrl ?>/assets/img/logo.png"
                             alt="logo"
                             data-src="<?= Yii::$app->homeUrl . Yii::$app->view->theme->baseUrl ?>/assets/img/logo.png"
                             data-src-retina="<?= Yii::$app->homeUrl . Yii::$app->view->theme->baseUrl ?>/assets/img/logo_2x.png"
                             width="78" height="22">
                    </div>
                </div>
            </div>
            <!-- RIGHT SIDE -->
            <div class="pull-right full-height visible-sm visible-xs">
                <!-- START ACTION BAR -->
                <div class="header-inner">
                    <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block"
                       data-toggle="quickview" data-toggle-element="#quickview">
                        <span class="icon-set menu-hambuger-plus"></span>
                    </a>
                </div>
                <!-- END ACTION BAR -->
            </div>
        </div>
        <!-- END MOBILE CONTROLS -->


        <div class=" pull-left sm-table hidden-xs hidden-sm">
            <form class=" pull-left sm-table hidden-xs hidden-sm" action="<?php echo Yii::$app->homeUrl ?>site/listado_onto" method="post">
                <input type="hidden" name="_onto_CSRF_frontend"
                       value="<?php echo Yii::$app->getRequest()->csrfToken?>"/>
                <div class="header-inner">
                    <div class="brand inline">
                        <img class="pull-right"
                             src="<?= Yii::$app->homeUrl . Yii::$app->view->theme->baseUrl ?>/assets/img/onto360.png"
                             alt="logo"
                             data-src="<?= Yii::$app->homeUrl . Yii::$app->view->theme->baseUrl ?>/assets/img/onto360.png"
                             data-src-retina="<?= Yii::$app->homeUrl . Yii::$app->view->theme->baseUrl ?>/assets/img/onto360.png"
                             width="190" height="35">
                    </div>
                    <input  class="search-link" placeholder="Escriba aquí..." name="buscar_onto"> <i class="pg-search"></i><strong> Buscar  <span
                            class="bold">Ontología</span></strong>
                </div>
            </form>
        </div>

        <?php if ($usuario != null) { ?>
            <div class=" pull-right">
                <!-- START User Info-->
                <div class="visible-lg visible-md m-t-10">
                    <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                        <span class="semi-bold"><?= $usuario->nombre ?></span> <span class="text-master"><?= $usuario->apellido1 ?></span> <span class="text-master"><?php echo $usuario->apellido2 ?></span>
                    </div>
                    <div class="dropdown pull-right">
                        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario->avatar ?>"
                     alt=""
                     data-src="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario->avatar ?>"
                     data-src-retina="<?= Yii::$app->homeUrl . Yii::$app->params['usuario_image_path'] . $usuario->avatar ?>"
                     width="32" height="32">
            </span>
                        </button>
                        <ul class="dropdown-menu profile-dropdown" role="menu">
                            <li>
                                <a href="<?php echo Yii::$app->homeUrl?>site/perfil"><i class="pg-settings_small"></i>Mi Perfil</a>
                            </li>
                            <li class="bg-master-lighter">
                                <a href="javascript:"  class="clearfix" id="bntformlogout">
                                    <span class="pull-left" >Salir (<?= $usuario->nombre ?>)</span>
                                    <span class="pull-right"><i class="pg-power"></i></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- END User Info-->
            </div>
        <?php }?>

    </div>
    <!-- END HEADER -->
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
        <div class="content ">
            <div class="bar">
                <div class="pull-right">
                    <a href="#"
                       class="text-black padding-10 visible-xs-inline visible-sm-inline pull-right m-t-10 m-b-10 m-r-10 on"
                       data-pages="horizontal-menu-toggle">
                        <i class=" pg-close_line"></i>
                    </a>
                </div>
                <div class="bar-inner">
                    <ul>
                        <li class="">
                            <a href="<?php echo Yii::$app->homeUrl?>" title="Página Inicial">
                                <strong>ONTO 360</strong></span>
                            </a>
                        </li>

                        <li class="classic">
                            <a href="javascript:;"><i class="fs-14 sl-user"></i>
                                Usuario <span class="semi-bold"></span> <span class="arrow"></span>
                            </a>
                            <ul class="classic">
                                <?php if(Yii::$app->getUser()->identity == null){?>
                                    <li>
                                        <a href="<?php echo Yii::$app->homeUrl ?>site/login"><i class="fa fa-check-circle"></i> Autenticarse
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::$app->homeUrl ?>site/registrarse"><i class="fs-14 sl-user-follow"></i> Registrarse
                                        </a>
                                    </li>

                                <?php }else{ ?>
                                    <li>
                                        <a href="<?php echo Yii::$app->homeUrl ?>site/cambio_contrasena"><i class="fs-14 fa fa-lock"></i> Cambiar Contraseña</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::$app->homeUrl ?>site/llenar_pregunta_respuestas"><i class="fs-14 sl-calculator"></i> Evaluar Experticia de Usuario
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::$app->homeUrl ?>site/experticia"><i class="fs-14 sl-magic-wand"></i> Usuarios Evaluados
                                        </a>
                                    </li>
                                <?php }?>
                            </ul>
                        </li>

                        <?php if(Yii::$app->getUser()->identity != null){ ?>
                            <li class="classic">
                                <a href="javascript:;"><i class="fa fa-cubes"></i>
                                    Recursos Ontológicos <span class="semi-bold"></span> <span class="arrow"></span>
                                </a>
                                <ul class="classic">
                                    <li>
                                        <a><i class="fs-14 fa fa-cube"></i>Perfil Ontología
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="<?php echo Yii::$app->homeUrl?>site/crear_onto_perfil">Crear perfil ontológico</a></li>
                                        </ul>
                                        <ul class="sub-menu">
                                            <li><a href="<?php echo Yii::$app->homeUrl?>site/listar_mi_perfil_onto">Mis perfiles ontológicos</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::$app->homeUrl ?>site/listado_onto"><i class="fs-14 pg-menu_justify"></i> Listado Ontologías
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::$app->homeUrl?>site/listado_tec"><i class="fs-14 fa fa-cloud-download"></i> Descargar tecnología</a>
                                    </li>

                                </ul>
                            </li>
                        <?php }?>
                        <li class="classic">
                            <a href="javascript:;"><i class="fs-14 fa fa-cloud"></i>
                                Foro <span class="semi-bold"></span> <span class="arrow"></span>
                            </a>
                            <ul class="classic">
                                <li>
                                    <a href="<?= Yii::$app->homeUrl?>site/foro"><i class="fs-14 pg-comment"></i> Compartir Experiencia Uso
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content ">
                <?= $content?>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->


    <form method="post" id="frmlogout" action="<?php echo Yii::$app->homeUrl?>/site/logout">
        <input type="hidden" name="_onto_CSRF_frontend"
               value="<?php echo Yii::$app->getRequest()->csrfToken?>"/>
    </form>

    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    <!-- END PAGE LEVEL JS -->

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
