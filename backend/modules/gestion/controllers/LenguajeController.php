<?php
/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Tue Jun 20 15:54:10 EDT 2017*/

namespace backend\modules\gestion\controllers;

use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\web\View;use yii\base\Exception;

use backend\modules\gestion\models\Lenguaje;
use backend\modules\gestion\models\LenguajeSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * lenguajeimplenta las acciones del modelo lenguaje .
 *
 */
class LenguajeController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list_json','list','update','index','view','create','delete','load_excel','excel','findbyukjson'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Load  all css and js for the view
     * @return void
     */
    public function actionAssetPlugin()
    {

        AppAssetPlugins::setPlugins_bootstrap_Modal($this->view);
        AppAssetPlugins::setPlugins_Fonts($this->view);
        AppAssetPlugins::setPlugins_NotificationsW8($this->view);
        AppAssetPlugins::setPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::setPlugins_Icheck($this->view);
        AppAssetPlugins::setPlugins_Noty($this->view);
        AppAssetPlugins::setPlugins_ComponentsCss($this->view);
        $this->view->registerJsFile('@web/js/validation/validation.js',
            ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
    }

    /**
     * Load  all css and js for the view
     * @return void
     */
    public function actionAssetPluginLoad()
    {

        $this->view->js=[];
        $this->view->css=[];
        AppAssetPlugins::getPlugins_bootstrap_Modal($this->view);
        AppAssetPlugins::getPlugins_Fonts($this->view);
        AppAssetPlugins::getPlugins_NotificationsW8($this->view);
        AppAssetPlugins::getPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::getPlugins_Icheck($this->view);
        AppAssetPlugins::getPlugins_Noty($this->view);
        AppAssetPlugins::getPlugins_ComponentsCss($this->view);
        array_push($this->view->js,Yii::$app->homeUrl.'/js/validation/validation.js');

    }

    /**
     * Lists all lenguaje models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->getIsAjax())
        {
            $this->actionAssetPluginLoad();
            //Datos de la Tabla lenguaje
            array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje.js');
            array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_datasource.js');
            array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_components.js');
            array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_actions_ajax.js');
            array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_init.js');
            return $this->getView()->render('@backend/modules/gestion/views/lenguaje/index',array('index'=>false));
        }
        else
        {
            $this->actionAssetPlugin();
            //Datos de la Tabla lenguaje
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje.js',
                ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_datasource.js',
                ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_components.js',
                ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_actions_ajax.js',
                ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_init.js',
                ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

            return $this->render('index', [
                'index'=>true
            ]);
        }
    }
    /**
     * Displays a single lenguaje model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new lenguaje model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $post=count(Yii::$app->request->post())>0;

        $action='create';
        if (Yii::$app->request->getIsAjax()) {
            if($post)
            {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $model = new Lenguaje();
                $lenguaje= (object)Yii::$app->request->post('lenguaje');
                if ($model->load(Yii::$app->request->post())) {
                    try {
                        $result=$model->save();
                        if($result)
                            $jsonResult = array('success' => true, 'message' => '');
                        else
                            $jsonResult = array('success' => false, 'message' => 'Ocurrio un error en la insercion verifique bien los datos');
                    } catch (Exception $e) {
                        $jsonResult = array('success' => false, 'message' => '');
                    }
                    return $jsonResult;
                }
            }
            else
            {
                $this->actionAssetPluginLoad();
                $action='create';
                $model = new Lenguaje();
                //Datos de la Tabla lenguaje
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_datasource.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_components.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_actions_ajax.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_init.js');
                return $this->getView()->render('@backend/modules/gestion/views/lenguaje/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
            }
        }
        else
        {
            $model = new Lenguaje();
            if ($post){
                if ($model->load(Yii::$app->request->post())) {
                    try {

                        $result=$model->save();
                        if($result){
                            if (strpos($_POST['btnsubmit'], 'new') == -1)
                                return $this->redirect(Yii::$app->homeUrl.'gestion/lenguaje');
                            else
                                return $this->redirect(Yii::$app->homeUrl.'gestion/lenguaje/create');
                        }
                        else
                        {
                            return $this->render('form', [
                                'message'=>'Ocurrio un error en la insercion del elemento',
                                'model' => $model,
                                'action' => $action,
                                'textaction'=>'Insertar',
                                'idlenguaje'=>'',
                            ]);
                        }
                    } catch (\Exception $e) {
                        return $this->render('form', [
                            'message'=>'Ocurrio un error en la insercion del elemento',
                            'model' => $model,
                            'action' => $action,
                            'textaction'=>'Insertar',
                            'idlenguaje'=>'',
                        ]);
                    }
                }
            }else{
                $this->actionAssetPlugin();
                //Datos de la Tabla lenguaje
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje.js',
                    ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_datasource.js',
                    ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_components.js',
                    ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_actions.js',
                    ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_init.js',
                    ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

                return $this->render('form', [
                    'message'=>'',
                    'model' => $model,
                    'action' => $action,
                    'textaction'=>'Insertar',
                    'idlenguaje'=>'',
                ]);
            }
        }
    }
    /**
     * Update a lenguaje model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdate()
    {
        $post=count(Yii::$app->request->post())>0;

        $action='update';
        if (Yii::$app->request->getIsAjax() ) {
            if($post)
            {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                $lenguaje= (object)Yii::$app->request->post('Lenguaje');
                $model =  $this->findModel($lenguaje->idlenguaje);
                if ($model->load(Yii::$app->request->post())) {
                    try {
                        $result=$model->save();
                        $jsonResult = array('success' => true, 'message' => '');
                    } catch (\Exception $e) {
                        $jsonResult = array('success' => false, 'message' => '');
                    }
                    return $jsonResult;
                }
            }
            else
            {
                $this->actionAssetPluginLoad();
                $model = new lenguaje();
                //Datos de la Tabla lenguaje
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_datasource.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_components.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_actions_ajax.js');
                array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_init.js');
                return $this->getView()->render('@backend/modules/gestion/views/lenguaje/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
            }
        }
        else
        {
            if(!$post){
                if(isset($_GET['id']))
                {
                    $condition =array(
                        'idlenguaje'=>$_GET['id']
                    );
                    $model = Lenguaje::findOne($condition);

                    if(is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl().'gestion/lenguaje');
                    $this->actionAssetPlugin();
                    //Datos de la Tabla lenguaje
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje.js',
                        ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_datasource.js',
                        ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_components.js',
                        ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_actions.js',
                        ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/lenguaje/kendo_lenguaje_init.js',
                        ['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

                    return $this->render('form', [
                        'message'=>'',
                        'model' => $model,
                        'action' => $action,
                        'textaction'=>'Actualizar',
                        'idlenguaje'=>'lenguaje[idlenguaje]',
                    ]);
                }
                else
                    return $this->redirect(Yii::$app->homeUrl.'gestion/lenguaje');


            }
            //Request por post
            $idlenguaje=Yii::$app->request->post('Lenguaje')['idlenguaje'];
            $condition =array(
                'idlenguaje'=>$idlenguaje
            );
            $model=lenguaje::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    $model->save();
                    return $this->redirect(Yii::$app->homeUrl.'gestion/lenguaje');
                } catch (\Exception $e) {
                    return $this->render('form', [
                        'message'=>'Ocurrio un error en la actualizacion del elemento',
                        'model' => $model,
                        'action' => $action,
                        'textaction'=>'Actualizar',
                        'idlenguaje'=>'lenguaje[idlenguaje]',
                    ]);
                }
            }
        }
        //Si no hay datos redirecciona al index
        return $this->redirect(Yii::$app->homeUrl.'gestion/lenguaje');
    }
    /**
     * Deletes an existing lenguaje model.
     * If deletion is successful, return a message in json format with ok response.
     * @return josn format message
     */
    public function actionDelete()
    {
        if($_POST['array']){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $array= json_decode($_POST['array']);
            try {
                foreach ($array as $lenguaje) {
                    $id=array(
                        'idlenguaje'=>$lenguaje->idlenguaje
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El lenguaje  fue eliminado con exito');
                }            }
            catch (\Exception $e) {
                $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
            }
            return $jsonResult;
        }
    }
    /**
     * Find a single lenguaje model.
     * @return mixed
     */
    public function actionFindbyukjson()
    {
        if (Yii::$app->request->getIsAjax() && isset( $_GET['lenguaje'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $condition=$_GET['Lenguaje'];
            $lenguaje=Lenguaje::findByUK($condition);
            $jsonResult = array('valid' => true);
            if($lenguaje!=null &&  $_GET['idlenguaje']!=$lenguaje['idlenguaje'])
                $jsonResult = array('valid' => false);
            return $jsonResult;
        }
    }
    /**
     * Finds the lenguaje model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return lenguaje the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lenguaje::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('LA pagina solicitada no existe');
        }
    }


    /**
     * Returns a list of models in JSON format.
     * This method is used by the js in the view.
     * @return a list of models in json format
     */
    public function actionList_json()
    {

        if (Yii::$app->request->getIsAjax())
        {
            $query= new Query();
            $rows='';
            if(isset($_GET['combo']))
            {
                $like='';
                if(isset($_GET['q']))
                    $like=$_GET['q'];
                $rows = $query
                    ->from('lenguaje')
                    ->orderBy(array('lenguaje.idlenguaje'=>SORT_ASC))
                    ->select('lenguaje.*,lenguaje.lenguaje as text ,lenguaje.idlenguaje as id ')
                    ->where('lenguaje.lenguaje LIKE '."'%".$like."%'")
                    ->all();
                $result['data']=$rows;
                $rows=$result;
            }
            else
                $rows = $query
                    ->from('lenguaje')
                    ->orderBy(array('lenguaje.idlenguaje'=>SORT_ASC))
                    ->select('lenguaje.*')
                    ->all();
            if (isset($_GET['callback'])) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSONP;
                $callback = $_GET['callback'];
                return ['callback' => $callback, 'data' => $rows];
            } else {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $rows;
            }
        }

    }
    /**
     * Load  from Excel a list of the lenguaje table based on its primary key value.
     * @return boolean the list is loaded
     */
    public  function actionLoad_excel()
    {
        if (Yii::$app->request->getIsAjax()) {
            $fileadreess = $_FILES['excel']['tmp_name'];
            include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
            $exceklib= new \PHPExcel_IOFactory();
            $message='';
            $objPHPExcel = $exceklib->load($fileadreess);
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
            {
                $lastRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $lastRow; $row++)
                {
                    $idlenguaje = $worksheet->getCell('A' . $row)->getFormattedValue();
                    if (!empty($idlenguaje)) {
                        $idlenguaje = $worksheet->getCell('A' . $row)->getValue();
                        $lenguaje = $worksheet->getCell('B' . $row)->getValue();
                        $lenguaje = new Lenguaje();
                        $lenguaje->idlenguaje  =  $idlenguaje;
                        $lenguaje->lenguaje  =  $lenguaje;
                        $lenguaje->save();
                    }
                }
            }
            if($message=='')
            {
                $message = 'Los elementos fueron importados con exito';

            }
            $jsonResult = array('success' => true, 'message' => $message);
            echo json_encode($jsonResult);
        }	 }

    /**
     * Create a Excel file  from a list of the lenguaje
     * @return boolean the list is created
     */
    public  function actionExcel()
    {
        include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
        include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

        $lenguajelist=json_decode($_POST['lenguaje_export']);
        $objPHPExcel = new \PHPExcel();
        $name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
            ->setLastModifiedBy($name_user)
            ->setTitle('Listado de lenguaje')
            ->setSubject('Listado de lenguaje')
            ->setDescription('Documento con el listado de lenguajes segun '.Yii::$app->id);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'idlenguaje');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'lenguaje');
        $i=2;
        foreach($lenguajelist as  $lenguaje)
        {
            $lenguaje=(object)$lenguaje;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $lenguaje->idlenguaje);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $lenguaje->lenguaje);
            $i++;
        }

        $exceklib= new \PHPExcel_IOFactory();
        $objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
        header("Content-Disposition: attachment; filename=\"Listado_lenguaje.xls\"");
        header("Content-Type: application/vnd.ms-excel");
        $objWriter->save('php://output');
        exit;
    }

    /**
     * Returns a list of models .
     * @return a list of models
     */
    public function actionList()
    {
        if(count($_POST)>0) {
            $rows = Lenguaje::find()->all();
            return $rows;
        }
    }
}
?>
