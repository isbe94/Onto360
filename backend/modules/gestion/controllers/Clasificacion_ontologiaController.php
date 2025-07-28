<?php
/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\controllers;

use backend\modules\gestion\models\Ontologia;
use backend\modules\nomencladores\models\Clasificacion;
use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\web\View;
use yii\base\Exception;

use backend\modules\gestion\models\Clasificacion_ontologia;
use backend\modules\gestion\models\Clasificacion_ontologiaSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * clasificacion_ontologiaImplementa las acciones de la controladora del modelo clasificacion_ontologia .
 *
 */
class Clasificacion_ontologiaController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list_json', 'list', 'update', 'index', 'deletebyonto', 'deletebyclasif', 'view', 'create', 'delete', 'load_excel', 'excel', 'findbyukjson', 'list_clasbyonto'],
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
//		        AppAssetPlugins::setPlugins_Ladda($this->view);
        AppAssetPlugins::setPlugins_ComponentsCss($this->view);
        AppAssetPlugins::setPlugins_Select2($this->view);
        $this->view->registerJsFile('@web/js/validation/validation.js',
            ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
    }

    /**
     * Load  all css and js for the view
     * @return void
     */
    public function actionAssetPluginLoad()
    {

        $this->view->js = [];
        $this->view->css = [];
        AppAssetPlugins::getPlugins_bootstrap_Modal($this->view);
        AppAssetPlugins::getPlugins_Fonts($this->view);
        AppAssetPlugins::getPlugins_NotificationsW8($this->view);
        AppAssetPlugins::getPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::getPlugins_Icheck($this->view);
        AppAssetPlugins::getPlugins_Noty($this->view);
//		        AppAssetPlugins::getPlugins_Ladda($this->view);
        AppAssetPlugins::getPlugins_ComponentsCss($this->view);
        AppAssetPlugins::getPlugins_Select2($this->view);
        array_push($this->view->js, Yii::$app->homeUrl . '/js/validation/validation.js');

    }

    /**
     * Lists all Clasificacion_ontologia models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->getIsAjax()) {
            $this->actionAssetPluginLoad();
            //Datos de la Tabla Clasificacion_ontologia
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_datasource.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_components.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_actions_ajax.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_init.js');
            return $this->getView()->render('@backend/modules/gestion/views/clasificacion_ontologia/index', array('index' => false));
        } else {
            $this->actionAssetPlugin();
            //Datos de la Tabla Clasificacion_ontologia
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_datasource.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_components.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_actions_ajax.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_init.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

            return $this->render('index', [
                'index' => true
            ]);
        }
    }

    /**
     * Displays a single Clasificacion_ontologia model.
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
     * Creates a new Clasificacion_ontologia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $post = count(Yii::$app->request->post()) > 0;

        $action = 'create';
        if (Yii::$app->request->getIsAjax()) {
            if ($post) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $model = new Clasificacion_ontologia();
                if ($model->load(Yii::$app->request->post())) {
                    try {
                        if (isset($_POST['Clasificacion_ontologia']))
                            foreach ($_POST['Clasificacion_ontologia']['id_clasificacion'] as $clasif_post) {
                                $clasif_onto = new Clasificacion_ontologia();
                                $clasif_onto->id_ontologia = $_POST['Clasificacion_ontologia']['id_ontologia'];
                                $clasif_onto->id_clasificacion = intval($clasif_post);
                                $clasif_onto->save();


                            }
                        $result = $clasif_onto->save();
                        if ($result)
                            $jsonResult = array('success' => true, 'message' => '');
                        else
                            $jsonResult = array('success' => false, 'message' => 'Ocurrió un error en la insercion verifique bien los datos');
                    } catch (Exception $e) {
                        $jsonResult = array('success' => false, 'message' => '');
                    }
                    return $jsonResult;
                }
            } else {
                $this->actionAssetPluginLoad();
                $action = 'create';
                $model = new Clasificacion_ontologia();
                //Datos de la Tabla Clasificacion
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_components.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_actions_ajax.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_init.js');
                return $this->getView()->render('@backend/modules/gestion/views/clasificacion_ontologia/form', array('action' => $action, 'model' => $model, 'checked' => '', 'required' => 'required'));
            }
        } else {
            $model = new Clasificacion_ontologia();
            if ($post) {
                if ($model->load(Yii::$app->request->post())) {
                    try {

                        $result = $model->save();
                        if ($result) {
                            if (strpos($_POST['btnsubmit'], 'new') == -1)
                                return $this->redirect(Yii::$app->homeUrl . 'gestion/clasificacion_ontologia');
                            else
                                return $this->redirect(Yii::$app->homeUrl . 'gestion/clasificacion_ontologia/create');
                        } else {
                            return $this->render('form', [
                                'message' => 'Ocurrió un error en la inserción del elemento',
                                'model' => $model,
                                'action' => $action,
                                'textaction' => 'Insertar',
                                'idclasifonto' => '',
                            ]);
                        }
                    } catch (\Exception $e) {
                        return $this->render('form', [
                            'message' => 'Ocurrio un error en la inserción del elemento',
                            'model' => $model,
                            'action' => $action,
                            'textaction' => 'Insertar',
                            'idclasifonto' => '',
                        ]);
                    }
                }
            } else {
                $this->actionAssetPlugin();
                //Datos de la Tabla Clasificacion_ontologia
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_datasource.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_components.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_actions.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_init.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

                return $this->render('form', [
                    'message' => '',
                    'model' => $model,
                    'action' => $action,
                    'textaction' => 'Insertar',
                    'idclasifonto' => '',
                ]);
            }
        }
    }

    /**
     * Update a Clasificacion_ontologia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdate()
    {
        $post = count(Yii::$app->request->post()) > 0;

        $action = 'update';
        if (Yii::$app->request->getIsAjax()) {
            $result = false;
            if (count(Yii::$app->request->post()) > 0) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $clasificacion_ontologia = (object)Yii::$app->request->post('Clasificacion_ontologia');
                $model = Ontologia::findOne($clasificacion_ontologia->id_ontologia);
                foreach ($clasificacion_ontologia->id_clasificacion as $item) {
                    $co = Clasificacion_ontologia::find()->where('id_clasificacion=' . $item)->andWhere('id_ontologia=' . $model->primaryKey)->all();
                    if (count($co) == 0) {
                        $clasif_onto = new Clasificacion_ontologia();
                        $clasif_onto->id_ontologia = $model->primaryKey;
                        $clasif_onto->id_clasificacion = $item;
                        $result = $clasif_onto->save();
                    }

                    $lista_clasificaciones_ontologia = Clasificacion_ontologia::find()->where('id_ontologia=' . $model->primaryKey)->all();
                    foreach ($lista_clasificaciones_ontologia as $element_clasif) {
                        if (in_array($element_clasif->id_clasificacion, $clasificacion_ontologia->id_clasificacion) == false) {
                            Clasificacion_ontologia::deleteAll("id_clasificacion=" . $element_clasif->id_clasificacion);
                            $result=true;
                        }
                    }
                }
                $jsonResult = array('success' => $result, 'message' => '');
                return $jsonResult;

            } else {
                $this->actionAssetPluginLoad();
                $model = new Clasificacion_ontologia();
                //Datos de la Tabla Clasificacion_ontologia
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_components.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_actions_ajax.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_init.js');
                return $this->getView()->render('@backend/modules/gestion/views/clasificacion_ontologia/form', array('action' => $action, 'model' => $model, 'checked' => '', 'required' => 'required'));
            }
        }
        else
        {
            if (!$post) {
                if (isset($_GET['id'])) {
                    $condition = array(
                        'idclasifonto' => $_GET['id']
                    ,
                    );
                    $model = Clasificacion_ontologia::findOne($condition);

                    if (is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl() . 'gestion/clasificacion_ontologia');
                    $this->actionAssetPlugin();
                    //Datos de la Tabla Clasificacion_ontologia
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_datasource.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_components.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_actions.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/clasificacion_ontologia/kendo_clasificacion_ontologia_init.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

                    return $this->render('form', ['message' => '',
                        'model' => $model,
                        'action' => $action,
                        'textaction' => 'Actualizar',
                        'idclasifonto' => 'Clasificacion_ontologia[idclasifonto]',]);
                } else
                    return $this->redirect(Yii::$app->homeUrl . 'gestion/clasificacion_ontologia');

            }
//Request por post
            $idclasifonto = Yii::$app->request->post('Clasificacion_ontologia')['idclasifonto'];
            $condition = array(
                'idclasifonto' => $idclasifonto
            ,
            );
            $model = Clasificacion_ontologia::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    $model->save();
                    return $this->redirect(Yii::$app->homeUrl . 'gestion/clasificacion_ontologia');
                } catch (\Exception $e) {
                    return $this->render('form', [
                        'message' => 'Ocurrio un error en la actualizacion del elemento',
                        'model' => $model,
                        'action' => $action,
                        'textaction' => 'Actualizar',
                        'idclasifonto' => 'Clasificacion_ontologia[idclasifonto]',
                    ]);
                }
            }
        }
//Si no hay datos redirecciona al index
        return $this->redirect(Yii::$app->homeUrl . 'gestion/clasificacion_ontologia');
    }
    /**
     * Deletes an existing Clasificacion_ontologia model.
     * If deletion is successful, return a message in json format with ok response.
     * @return array format message
     */
    public function actionDelete()
    {
        if ($_POST['array']) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $jsonResult = [];
            $array = json_decode($_POST['array']);
            try {
                foreach ($array as $clasificacion_ontologia) {
                    $id = array(
                        'idclasifonto' => $clasificacion_ontologia->idclasifonto
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El clasificacion_ontologia  fue eliminado con exito');
                }
            } catch (\Exception $e) {
                $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
            }
            return $jsonResult;
        }
    }

    public
    function actionDeletebyonto()
    {
        if ($_POST['array']) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $jsonResult = [];
            $array = json_decode($_POST['array']);
            try {
                foreach ($array as $ontologia) {
                    Clasificacion_ontologia::deleteAll("id_ontologia=" . $ontologia->idontologia);
                    $jsonResult = array('success' => true, 'message' => 'El clasificacion_ontologia  fue eliminado con exito');
                }
            } catch (\Exception $e) {
                $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
            }
            return $jsonResult;
        }
    }

    public
    function actionDeletebyclasif()
    {
        if ($_POST['array']) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $jsonResult = [];
            $array = json_decode($_POST['array']);
            try {
                foreach ($array as $ontologia) {
                    Clasificacion_ontologia::deleteAll("id_ontologia=" . $ontologia->idontologia);
                    $jsonResult = array('success' => true, 'message' => 'El clasificacion_ontologia  fue eliminado con exito');
                }
            } catch (\Exception $e) {
                $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
            }
            return $jsonResult;
        }
    }

    /**
     * Finds the Clasificacion_ontologia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clasificacion_ontologia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Clasificacion_ontologia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('LA pagina solicitada no existe');
        }
    }


//	public function actionList_grid()
//	{
//		if (Yii::$app->request->getIsAjax())
//		{
//			$query= new Query();
//			$rows=$query
//				->from('clasificacion_ontologia')
//				->orderBy(array('clasificacion_ontologia.idclasifonto'=>SORT_ASC))
//				->join('inner join','ontologia','clasificacion_ontologia.id_ontologia=ontologia.idontologia')
//				->join('inner join','clasificacion','clasificacion_ontologia.id_clasificacion=clasificacion.idclasificacion')
//				->select('clasificacion_ontologia.*,ontologia.nombre ,clasificacion.clasificacion ')
//				->all();
//			if (isset($_GET['callback'])) {
//				\Yii::$app->response->format = \yii\web\Response::FORMAT_JSONP;
//				$callback = $_GET['callback'];
//				return ['callback' => $callback, 'data' => $rows];
//			} else {
//				\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//				return $rows;
//			}
//		}
//
//	}

    public
    function actionList_json()
    {

        if (Yii::$app->request->getIsAjax()) {
            $query = new Query();
            $rows = '';
            if (isset($_GET['combo'])) {
                $like = '';
                if (isset($_GET['q']))
                    $like = $_GET['q'];
                $rows = $query
                    ->from('clasificacion_ontologia')
                    ->orderBy(array('clasificacion_ontologia.idclasifonto' => SORT_ASC))
                    ->join('inner join', 'ontologia', 'clasificacion_ontologia.id_ontologia=ontologia.idontologia')
                    ->join('inner join', 'clasificacion', 'clasificacion_ontologia.id_clasificacion=clasificacion.idclasificacion')
                    ->select('clasificacion_ontologia.*,ontologia.nombre ,clasificacion.clasificacion ,clasificacion_ontologia.id_ontologia as text ,clasificacion_ontologia.idclasifonto as id ')
                    ->where('clasificacion_ontologia.id_ontologia LIKE ' . "'%" . $like . "%'")
                    ->all();
                $result['data'] = $rows;
                $rows = $result;
            } else
                $rows = $query
                    ->from('clasificacion_ontologia')
//                    ->orderBy(array('clasificacion_ontologia.idclasifonto' => SORT_ASC))
                    ->join('inner join', 'ontologia', 'clasificacion_ontologia.id_ontologia=ontologia.idontologia')
//                    ->join('inner join', 'clasificacion', 'clasificacion_ontologia.id_clasificacion=clasificacion.idclasificacion')
                    ->select(["ontologia.* , GROUP_CONCAT(clasificacion_ontologia.id_clasificacion SEPARATOR ',')  as clasif_array"])->distinct(true)->groupBy('ontologia.idontologia')
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


    public function actionList_clasbyonto($id)
    {

        if (Yii::$app->request->getIsAjax()) {
            $query = new Query();
            $rows = '';
            $rows = $query
                ->from('clasificacion_ontologia')
                ->orderBy(array('clasificacion_ontologia.idclasifonto' => SORT_ASC))
                ->join('inner join', 'clasificacion', 'clasificacion_ontologia.id_clasificacion=clasificacion.idclasificacion')
                ->select('clasificacion_ontologia.* ,clasificacion.* ')
                ->where('clasificacion_ontologia.id_ontologia=' . $id)
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
     * Returns a list of models in JSON format.
     * This method is used by the js in the view.
     * @return array list of models in json format
     *
     *
     *
     *
     *
     * /**
     * Load  from Excel a list of the Clasificacion_ontologia table based on its primary key value.
     * @return boolean the list is loaded
     */
    public
    function actionLoad_excel()
    {
        if (Yii::$app->request->getIsAjax()) {
            $fileadreess = $_FILES['excel']['tmp_name'];
            include(Yii::$app->basePath . '/vendor/php_excel/PHPExcel_IOFactory.php');
            $exceklib = new \PHPExcel_IOFactory();
            $message = '';
            $objPHPExcel = $exceklib->load($fileadreess);
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                $lastRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $lastRow; $row++) {
                    $idclasifonto = $worksheet->getCell('A' . $row)->getFormattedValue();
                    if (!empty($idclasifonto)) {
                        $idclasifonto = $worksheet->getCell('A' . $row)->getValue();
                        $id_ontologia = $worksheet->getCell('B' . $row)->getValue();
                        $id_clasificacion = $worksheet->getCell('C' . $row)->getValue();
                        $clasificacion_ontologia = new Clasificacion_ontologia();
                        $clasificacion_ontologia->idclasifonto = $idclasifonto;
                        $clasificacion_ontologia->id_ontologia = $id_ontologia;
                        $clasificacion_ontologia->id_clasificacion = $id_clasificacion;
                        $clasificacion_ontologia->save();
                    }
                }
            }
            if ($message == '') {
                $message = 'Los elementos fueron importados con exito';

            }
            $jsonResult = array('success' => true, 'message' => $message);
            echo json_encode($jsonResult);
        }
    }

    /**
     * Create a Excel file  from a list of the Clasificacion_ontologia
     * @return boolean the list is created
     */
    public
    function actionExcel()
    {
        include(Yii::$app->basePath . '/vendor/php_excel/PHPExcel_IOFactory.php');
        include(Yii::$app->basePath . '/vendor/php_excel/PHPExcel.php');

        $clasificacion_ontologialist = json_decode($_POST['clasificacion_ontologia_export']);
        $objPHPExcel = new \PHPExcel();
        $name_user = Yii::$app->getUser()->identity->oldAttributes['username'];
        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
            ->setLastModifiedBy($name_user)
            ->setTitle('Listado de Clasificacion_ontologia')
            ->setSubject('Listado de Clasificacion_ontologia')
            ->setDescription('Documento con el listado de Clasificacion_ontologias segun ' . Yii::$app->id);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'idclasifonto');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'id_ontologia');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'id_clasificacion');
        $i = 2;
        foreach ($clasificacion_ontologialist as $clasificacion_ontologia) {
            $clasificacion_ontologia = (object)$clasificacion_ontologia;
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $clasificacion_ontologia->idclasifonto);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $clasificacion_ontologia->id_ontologia);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $clasificacion_ontologia->id_clasificacion);
            $i++;
        }

        $exceklib = new \PHPExcel_IOFactory();
        $objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
        header("Content-Disposition: attachment; filename=\"Listado_clasificacion_ontologia.xls\"");
        header("Content-Type: application/vnd.ms-excel");
        $objWriter->save('php://output');
        exit;
    }


    /**
     * Find a single Clasificacion_ontologia model.
     * @return mixed
     */
    public
    function actionFindbyukjson()
    {
        if (Yii::$app->request->getIsAjax() && isset($_GET['Clasificacion_ontologia'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $condition = $_GET['Clasificacion_ontologia'];
            $clasificacion_ontologia = Clasificacion_ontologia::findByUK($condition);
            $jsonResult = array('valid' => true);
            if ($clasificacion_ontologia != null && $_GET['idclasifonto'] != $clasificacion_ontologia['idclasifonto'])
                $jsonResult = array('valid' => false);
            return $jsonResult;

        }
    }


    /**
     *
     *
     *
     * /**
     * Returns a list of models .
     * @return a list of models
     */
    public
    function actionList()
    {
        if (count($_POST) > 0) {
            $rows = Clasificacion_ontologia::find()->all();
            return $rows;
        }
    }
}


?>
