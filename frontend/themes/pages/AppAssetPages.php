<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\themes\pages;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetPages extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/../themes/pages';


    public $css = [
        "assets/plugins/pace/pace-theme-flash.css",
        "assets/plugins/boostrapv3/css/bootstrap.min.css",
        "assets/plugins/font-awesome/css/font-awesome.css",
        "assets/plugins/jquery-scrollbar/jquery.scrollbar.css",
        "assets/plugins/switchery/css/switchery.min.css",
        "assets/plugins/nvd3/nv.d3.min.css",
        "assets/plugins/mapplic/css/mapplic.css",
        "assets/plugins/rickshaw/rickshaw.min.css",
        "assets/plugins/bootstrap-datepicker/css/datepicker3.css",
        "assets/plugins/jquery-metrojs/MetroJs.css",
        "pages/css/pages-icons.css",
        "pages/css/pages.css",
        "assets/plugins/codrops-dialogFx/dialog.ie.css",
        "assets/plugins/simple-line-icons/simple-line-icons.css",
        "assets/plugins/datatables-responsive/css/datatables.responsive.css",
        "assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css",
        "assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css",
        "assets/plugins/jquery-dynatree/skin/ui.dynatree.css"
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
        "assets/plugins/classie/classie.js",
        "assets/plugins/switchery/js/switchery.min.js",
        "assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js",
        "assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js",
        "assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js",
        "assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js",
        "assets/plugins/datatables-responsive/js/datatables.responsive.js",
        "assets/plugins/datatables-responsive/js/lodash.min.js",
//        "assets/plugins/nvd3/lib/d3.v3.js",
//        "assets/plugins/nvd3/nv.d3.min.js",
//        "assets/plugins/nvd3/src/utils.js",
//        "assets/plugins/nvd3/src/tooltip.js",
//        "assets/plugins/nvd3/src/interactiveLayer.js",
//        "assets/plugins/nvd3/src/models/axis.js",
//        "assets/plugins/nvd3/src/models/line.js",
//        "assets/plugins/nvd3/src/models/lineWithFocusChart.js",
//        "assets/plugins/mapplic/js/hammer.js",
//        "assets/plugins/mapplic/js/jquery.mousewheel.js",
//        "assets/plugins/mapplic/js/mapplic.js",
//        "assets/plugins/rickshaw/rickshaw.min.js",
        "assets/plugins/jquery-metrojs/MetroJs.min.js",
        "assets/plugins/jquery-sparkline/jquery.sparkline.min.js",
        "assets/plugins/skycons/skycons.js",
        "assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js",
        "pages/js/pages.min.js",
        "assets/js/dashboard.js",
        "assets/js/scripts.js",
        //Init
        'assets/global/scripts/init.js',
        "assets/plugins/jquery-dynatree/jquery.dynatree.min.js",
        "assets/js/tree_view.js"
    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}
