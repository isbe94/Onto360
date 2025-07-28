<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace frontend\themes\pages\assets\php;
use frontend\themes\pages\AppAssetPages;
use yii\web\View;

class AppAssetPlugins
{
    static function setPlugins_ComponentsCss($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/css/components.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/css/plugins.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/css/breadcumbs.css',
            ['depends' => [AppAssetPages::className()]]);
		 $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/font-awesome-animation/font-awesome-animation.min.css',
            ['depends' => [AppAssetPages::className()]]);
    }
    static function setPlugins_LineIcon($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'assets/plugins/simple-line-icons/simple-line-icons.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function setPlugins_TreeCss($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'assets/js/tree_view.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'assets/plugins/jquery-dynatree/jquery.dynatree.min.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'assets/plugins/jquery-dynatree/skin/ui.dynatree.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_ComponentsCss($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/css/components.css');
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/css/plugins.css');
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/css/breadcumbs.css');
    }

    static function setPlugins_ComponentsMatrerialCss($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/css/components-md.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/css/plugins-md.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/css/breadcumbs.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_ComponentsMaterialCss($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/css/components-md.css');
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/css/plugins-md.css');
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/css/breadcumbs.css');
    }

    static function setPlugins_Select2($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/select2/js/select2.min.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/select2/css/select2.css',
            ['depends' => [AppAssetPages::className()]]);
    }
    static function getPlugins_Select2($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/select2/css/select2.css');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/select2/js/select2.min.js');
    }
    static function setPlugins_SwitcheryBootstrap($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap-switch/js/bootstrap-switch.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap-switch/css/bootstrap-switch.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_SwitcheryBootstrap($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap-switch/css/bootstrap-switch.css');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap-switch/js/bootstrap-switch.js');
    }
	static function setPlugins_Tour($view)
    {
        $view->registerJsFile('@web/' . $view->theme->baseUrl . '/assets/plugins/bootstrap-tour/build/js/bootstrap-tour.min.js',
            ['depends' => [AppAssetPages::className()]]);

        $view->registerCssFile('@web/' . $view->theme->baseUrl . '/assets/plugins/bootstrap-tour/build/css/bootstrap-tour.min.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_Tour($view)
    {
        array_push($view->js, \Yii::$app->homeUrl . $view->theme->baseUrl . '/assets/plugins/bootstrap-tour/build/js/bootstrap-tour.min.js');
        array_push($view->css, \Yii::$app->homeUrl . $view->theme->baseUrl . '/assets/plugins/bootstrap-tour/build/css/bootstrap-tour.min.css');
    }
    static function getPlugins_Icheck($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/icheck/skins/all.css');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/icheck/icheck.js');
    }

    static function setPlugins_Icheck($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/icheck/icheck.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/icheck/skins/all.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function setPlugins_DropZone($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/dropzone/dropzone.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/dropzone/form-dropzone.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/dropzone/css/dropzone.min.css',
            ['depends' => [AppAssetPages::className()]]);
    }
    static function getPlugins_DropZone($view)
    {
        array_push($view->js, \Yii::$app->homeUrl . $view->theme->baseUrl . '/assets/plugins/dropzone/dropzone.js');
        array_push($view->js, \Yii::$app->homeUrl . $view->theme->baseUrl . '/assets/plugins/dropzone/form-dropzone.js');
        array_push($view->css, \Yii::$app->homeUrl . $view->theme->baseUrl . '/assets/plugins/dropzone/css/dropzone.css');
    }
    static function setPlugins_Rateit($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/rateit/src/jquery.rateit.min.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/rateit/src/rateit.css',
            ['depends' => [AppAssetPages::className()]]);
    }
    static function getPlugins_RateIt($view)
    {
        array_push($view->js, \Yii::$app->homeUrl . $view->theme->baseUrl . '/assets/plugins/rateit/src/jquery.rateit.min.js');
        array_push($view->css, \Yii::$app->homeUrl . $view->theme->baseUrl . '/assets/plugins/rateit/src/rateit.css');
    }


    static function setPlugins_GMaps($view)
    {
        $view->registerJsFile('http://maps.google.com/maps/api/js?key=AIzaSyDQhpACSMC-sTfLLI7tjj_-SyjAKeg32Ck',
            ['depends' => [AppAssetPages::className()]]);
        // https://maps.googleapis.com/maps/api/js?key=AIzaSyDQhpACSMC-sTfLLI7tjj_-SyjAKeg32Ck&sensor=true
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/google-maps/markerclusterer.min.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/google-maps/gmaps.min.js',
            ['depends' => [AppAssetPages::className()]]);

    }
    static function getPlugins_GMaps($view)
    {
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/google-maps/markerclusterer.min.js');
        array_push($view->js,'http://maps.google.com/maps/api/js?sensor=true');
//        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/google-maps/api.google.js');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/google-maps/gmaps.min.js');
    }

    static function setPlugins_TimePicker($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/timepicker/jquery-ui-timepicker-addon.min.js',
            ['depends' => [AppAssetPages::className()]]);
    }
    static function getPlugins_TimePicker($view)
    {
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/timepicker/jquery-ui-timepicker-addon.min.js');
    }
    static function setPlugins_Notifications($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/jquery-notific8/jquery.notific8.min.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/jquery-notific8/jquery.notific8.min.js',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_Notifications($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/jquery-notific8/jquery.notific8.min.css');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/jquery-notific8/jquery.notific8.min.js');
    }
    static function setPlugins_Noty($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/noty/jquery.noty.packaged.min.js',
            ['depends' => [AppAssetPages::className()]]);
			$view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/noty/js/notifications.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/noty/css/animate.css',
            ['depends' => [AppAssetPages::className()]]);
       // $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/noty/css/buttons.css',
            //['depends' => [AppAssetPages::className()]]);
    }
    static function getPlugins_Noty($view)
    {
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/noty/jquery.noty.packaged.min.js');
		 array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/noty/js/notifications.js');
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/noty/css/animate.css');
       // array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/noty/css/buttons.css');
    }
    static function setPlugins_NotificationsW8($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/notifications/css/MetroNotificationStyle.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/notifications/js/notifications.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/notifications/js/scriptgates.js',
            ['depends' => [AppAssetPages::className()]]);
    }

    
    static function setPlugins_dataTables($view)
    {
       
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js',
            ['depends' => [AppAssetPages::className()]]);

    }
    static function setPlugins_jqueryScrollbar($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'assets/plugins/jquery-scrollbar/jquery.scrollbar.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.' assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
            ['depends' => [AppAssetPages::className()]]);
       
       
    }

    static function setPlugins_boostrapv3($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'assets/plugins/boostrapv3/css/bootstrap.min.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.' assets/plugins/boostrapv3/js/bootstrap.min.js',
            ['depends' => [AppAssetPages::className()]]);


    }
    static function setPlugins_collapse($view)
    {

        $view->registerJsFile('@web/'.$view->theme->baseUrl.' assets/plugins/bootstrap-collapse/bootstrap-tabcollapse.js',
            ['depends' => [AppAssetPages::className()]]);


    }

    static function setPlugins_classie($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.' assets/plugins/classie/classie.js',
            ['depends' => [AppAssetPages::className()]]);


    }
    static function setPlugins_dataTablesResponsive($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'assets/plugins/datatables-responsive/css/datatables.responsive.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.' assets/plugins/datatables-responsive/js/datatables.responsive.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.' assets/plugins/datatables-responsive/js/lodash.min.js',
            ['depends' => [AppAssetPages::className()]]);

    } 


    static function getPlugins_NotificationsW8($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/notifications/css/MetroNotificationStyle.css');
        array_push($view->js, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/notifications/js/notifications.js');

    }
    static function setPlugins_bootstrap_Validation($view)
    {
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap_validation/dist/js/bootstrapValidator.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap_validation/dist/css/bootstrapValidator.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_bootstrap_Validation($view)
    {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap_validation/dist/css/bootstrapValidator.css');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap_validation/dist/js/bootstrapValidator.js');
    }


    static function setPlugins_bootstrap_Modal($view)
   {

        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/js/bootstrap-modal.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/css/bootstrap-modal.css',
            ['depends' => [AppAssetPages::className()]]);
    }


    static function getPlugins_bootstrap_Modal($view)
    {
        array_push($view->css, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css');
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/css/bootstrap-modal.css');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/bootstrap-modal/js/bootstrap-modal.js');
    }


    static function setPlugins_Summernote($view)
   {

        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/summernote/js/summernote.min.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/summernote/css/summernote.css',
            ['depends' => [AppAssetPages::className()]]);
    }


    static function getPlugins_Summernote($view)
    {
        array_push($view->css, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/summernote/css/summernote.css');
        array_push($view->js, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/summernote/js/summernote.min.js');
    }


    static function setPlugins_Fonts($view)
   {

        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/animate.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/climacons-font.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/font-awesome.css',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/sli.css',
            ['depends' => [AppAssetPages::className()]]);
    }


    static function getPlugins_Fonts($view)
    {
        array_push($view->css, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/animate.css');
        array_push($view->css, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/climacons-font.css');
        array_push($view->css, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/font-awesome.css');
        array_push($view->css, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/all_fonts/styles/sli.css');
    }

    static function setPlugins_CKeditor($view)
   {

        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/ckeditor/ckeditor.js',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_CKeditor($view)
    {
        array_push($view->js, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/ckeditor/ckeditor.js');
    }

    static function setPlugins_wizard($view)
    {

        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/global/plugins/step-form-wizard/js/step-form-wizard.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/global/js/pages/form_wizard.js',
            ['depends' => [AppAssetPages::className()]]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/global/plugins/step-form-wizard/css/step-form-wizard.min.css',
            ['depends' => [AppAssetPages::className()]]);
    }

    static function getPlugins_wizard($view)
    {
        array_push($view->js, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/global/plugins/step-form-wizard/js/step-form-wizard.js');
        array_push($view->js, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/global/js/pages/form_wizard.js');
        array_push($view->css, \Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/global/plugins/step-form-wizard/css/step-form-wizard.min.css');
    }



    static function setPlugins_DateRange($view)
    {
        $view->registerCssFile('@web/'.$view->theme->baseUrl.'/assets/plugins/daterangepicker/daterangepicker.css',
            ['depends' => [AppAssetPages::className()]]);
       $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/daterangepicker/moment.min.js',
            ['depends' => [AppAssetPages::className()],'position'=>View::POS_END]);
        $view->registerJsFile('@web/'.$view->theme->baseUrl.'/assets/plugins/daterangepicker/daterangepicker.js',
            ['depends' => [AppAssetPages::className()],'position'=>View::POS_END]);
    }

    static function getPlugins_DateRange($view)
   {
        array_push($view->css,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/daterangepicker/daterangepicker-bs3.css');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/daterangepicker/moment.min.js');
        array_push($view->js,\Yii::$app->homeUrl.$view->theme->baseUrl.'/assets/plugins/daterangepicker/daterangepicker.js');
    }
}
			
