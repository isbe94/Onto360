<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\themes\pages;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com,
 * @since 2.0
 */
class AppAssetPagesLogin extends AssetBundle
{
    public $basePath = '@webroot/';
    public $baseUrl = '/themes/pages';


    public $css = [
        "assets/plugins/pace/pace-theme-flash.css",
        "assets/plugins/boostrapv3/css/bootstrap.min.css",
        "assets/plugins/font-awesome/css/font-awesome.css",
        "assets/plugins/jquery-scrollbar/jquery.scrollbar.css",
        "assets/plugins/bootstrap-select2/select2.css",
        "assets/plugins/switchery/css/switchery.min.css",
        "pages/css/pages-icons.css",
        "pages/css/pages.css",
        "pages/css/ie9.css"
    ];

    public $js = [
        "assets/plugins/pace/pace.min.js",
        "assets/plugins/jquery/jquery-1.11.1.min.js",
        "assets/plugins/modernizr.custom.js",
        "assets/plugins/jquery-ui/jquery-ui.min.js",
        "assets/plugins/boostrapv3/js/bootstrap.min.js",
        "assets/plugins/jquery/jquery-easy.js",
        "assets/plugins/jquery-unveil/jquery.unveil.min.js",
        "assets/plugins/jquery-bez/jquery.bez.min.js",
        "assets/plugins/jquery-ios-list/jquery.ioslist.min.js",
        "assets/plugins/jquery-actual/jquery.actual.min.js",
        "assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js",
        "assets/plugins/bootstrap-select2/select2.min.js",
        "assets/plugins/classie/classie.js",
        "assets/plugins/switchery/js/switchery.min.js",
        "assets/plugins/jquery-validation/js/jquery.validate.min.js",
        "pages/js/pages.min.js",
        "pages/js/init_login.js"
    ];

//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}
