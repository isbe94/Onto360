<?php
/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\controllers;

use backend\modules\gestion\models\Pregunta;
use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\web\View;use yii\base\Exception;

use backend\modules\gestion\models\Pregunta_respuestas;
use backend\modules\gestion\models\Pregunta_respuestasSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Pregunta_respuestasimplenta las acciones del modelo Pregunta_respuestas .
 *
 */
class Pregunta_respuestasController extends Controller
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['list_json','list','update','index','view','create','delete','load_excel','excel','findbyukjson','list_respbycuest','deletebypreg'],
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
		AppAssetPlugins::setPlugins_Select2($this->view);
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
		AppAssetPlugins::getPlugins_Select2($this->view);
		array_push($this->view->js,Yii::$app->homeUrl.'/js/validation/validation.js');

	}

	/**
	 * Lists all Pregunta_respuestas models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		if (Yii::$app->request->getIsAjax())
		{
			$this->actionAssetPluginLoad();
			//Datos de la Tabla Pregunta_respuestas
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_components.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_actions_ajax.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_init.js');
			return $this->getView()->render('@backend/modules/gestion/views/pregunta_respuestas/index',array('index'=>false));
		}
		else
		{
			$this->actionAssetPlugin();
			//Datos de la Tabla Pregunta_respuestas
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_components.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_actions_ajax.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_init.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

			return $this->render('index', [
				'index'=>true
			]);
		}
	}
	/**
	 * Displays a single Pregunta_respuestas model.
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
	 * Creates a new Pregunta_respuestas model.
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
				$model = new Pregunta_respuestas();
				if ($model->load(Yii::$app->request->post())) {
					try {
						if (isset($_POST['Pregunta_respuestas'])) {
							$cuest = new Pregunta_respuestas();
							$cuest->id_pregunta = $_POST['Pregunta_respuestas']['id_pregunta'];
							$cuest->id_respuesta = $_POST['Pregunta_respuestas']['id_respuesta'];
							if (array_key_exists('resp_correcta',['Pregunta_respuestas'])==true) {
								$cuest->resp_correcta = $_POST['Pregunta_respuestas']['id_pregunta'];
							}
							$cuest->save();
							$result = $cuest->save();
						}
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
				$model = new Pregunta_respuestas();
				//Datos de la Tabla Pregunta_respuestas
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_components.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_actions_ajax.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/pregunta_respuestas/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
		}
		else
		{
			$model = new Pregunta_respuestas();
			if ($post){
				if ($model->load(Yii::$app->request->post())) {
					try {

						$result=$model->save();
						if($result){
							if (strpos($_POST['btnsubmit'], 'new') == -1)
								return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta_respuestas');
							else
								return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta_respuestas/create');
						}
						else
						{
							return $this->render('form', [
								'message'=>'Ocurrio un error en la insercion del elemento',
								'model' => $model,
								'action' => $action,
								'textaction'=>'Insertar',
								'idpregunta_respuestas'=>'',
							]);
						}
					} catch (\Exception $e) {
						return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
							'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idpregunta_respuestas'=>'',
						]);
					}
				}
			}else{
				$this->actionAssetPlugin();
				//Datos de la Tabla Pregunta_respuestas
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_components.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
					'message'=>'',
					'model' => $model,
					'action' => $action,
					'textaction'=>'Insertar',
					'idpregunta_respuestas'=>'',
				]);
			}
		}
	}
	/**
	 * Update a Pregunta_respuestas model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionUpdate(){
		$post=count(Yii::$app->request->post())>0;

		$action='update';
		if (Yii::$app->request->getIsAjax() ) {
			if($post)
			{
				$result = false;
				if (count(Yii::$app->request->post()) > 0) {
					\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
					$cuest_bd=Pregunta_respuestas::find()->where(['id_pregunta' => $_POST['Pregunta_respuestas']['id_pregunta']])->andWhere(['id_respuesta' => $_POST['Pregunta_respuestas']['id_respuesta']])->one();
					$c_bd=(object)$cuest_bd;
					if (count($cuest_bd)== 1){
						Pregunta_respuestas::deleteAll("id_respuesta=" . $c_bd->id_respuesta);
						$cuest = new Pregunta_respuestas();
						$cuest->id_pregunta = $_POST['Pregunta_respuestas']['id_pregunta'];
						$cuest->id_respuesta = $_POST['Pregunta_respuestas']['id_respuesta'];
						$cuest->resp_correcta=$_POST['Pregunta_respuestas']['id_pregunta'];
						$result = $cuest->save();
					}
					else{
						$model = (object)Pregunta_respuestas::find()->where(['id_pregunta' => $_POST['Pregunta_respuestas']['id_pregunta']])->one();
						$cuest = new Pregunta_respuestas();
						$cuest->id_pregunta = $model->id_pregunta;
						$cuest->id_respuesta = $_POST['Pregunta_respuestas']['id_respuesta'];
						if (array_key_exists('resp_correcta',['Pregunta_respuestas'])==false){
							$cuest->resp_correcta=null;
						}
						else{
							$cuest->resp_correcta=$model->id_pregunta;
						}
						$result = $cuest->save();
					}
				}
				$jsonResult = array('success' => $result, 'message' => '');
				return $jsonResult;

			}
			else
			{
				$this->actionAssetPluginLoad();
				$model = new Pregunta_respuestas();
				//Datos de la Tabla Pregunta_respuestas
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_components.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_actions_ajax.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/pregunta_respuestas/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
		}
		else
		{
			if(!$post){
				if(isset($_GET['id']))
				{
					$condition =array(
						'idpregunta_respuestas'=>$_GET['id']
					);
					$model = Pregunta_respuestas::findOne($condition);

					if(is_null($model))
						return $this->redirect(Yii::$app->getHomeUrl().'gestion/pregunta_respuestas');
					$this->actionAssetPlugin();
					//Datos de la Tabla Pregunta_respuestas
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_datasource.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_components.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_actions.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta_respuestas/kendo_pregunta_respuestas_init.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
						'message'=>'',
						'model' => $model,
						'action' => $action,
						'textaction'=>'Actualizar',
						'idpregunta_respuestas'=>'Pregunta_respuestas[idpregunta_respuestas]',
					]);
				}
				else
					return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta_respuestas');


			}
//Request por post
			$idpregunta_respuestas=Yii::$app->request->post('Pregunta_respuestas')['idpregunta_respuestas'];
			$condition =array(
				'idpregunta_respuestas'=>$idpregunta_respuestas
			);
			$model=Pregunta_respuestas::findOne($condition);
			if ($model->load(Yii::$app->request->post())) {
				try {

					$model->save();
					return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta_respuestas');
				} catch (\Exception $e) {
					return $this->render('form', [
						'message'=>'Ocurrio un error en la actualizacion del elemento',
						'model' => $model,
						'action' => $action,
						'textaction'=>'Actualizar',
						'idpregunta_respuestas'=>'Pregunta_respuestas[idpregunta_respuestas]',
					]);
				}
			}
		}
//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta_respuestas');
	}
	/**
	 * Deletes an existing Pregunta_respuestas model.
	 * If deletion is successful, return a message in json format with ok response.
	 * @return josn format message
	 */
	public function actionDelete()
	{
		if($_POST['array']){
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$array= json_decode($_POST['array']);
			try {
				foreach ($array as $pregunta_respuestas) {
					$id=array(
						'idpregunta_respuestas'=>$pregunta_respuestas->idpregunta_respuestas
					);
					$this->findModel($id)->delete();
					$jsonResult = array('success' => true, 'message' => 'Eliminación con exito');
				}            }
			catch (\Exception $e) {
				$jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
			}
			return $jsonResult;
		}
	}

	public function actionDeletebypreg()
	{
		if ($_POST['array']) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$jsonResult = [];
			$array = json_decode($_POST['array']);
			try {
				foreach ($array as $pregunta) {
					if (Pregunta_respuestas::deleteAll("id_pregunta=". $pregunta->idpregunta)==true){
						$jsonResult = array('success' => true, 'message' => 'La pregunta  fue eliminada con exito');

					}
				}
			} catch (\Exception $e) {
				$jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminación');
			}
			return $jsonResult;
		}
	}
	/**
	 * Find a single Pregunta_respuestas model.
	 * @return mixed
	 */
	public function actionList_respbycuest($id)
	{

		if (Yii::$app->request->getIsAjax()) {
			$query = new Query();
			$rows = '';
			$rows = $query
				->from('pregunta_respuestas')
				->orderBy(array('pregunta_respuestas.idpregunta_respuestas' => SORT_ASC))
				->join('inner join', 'pregunta', 'pregunta_respuestas.id_pregunta=pregunta.idpregunta')
				->join('inner join', 'respuesta', 'pregunta_respuestas.id_respuesta=respuesta.idrespuesta')
				->select('pregunta_respuestas.* ,pregunta.*,respuesta.* ')
				->where('pregunta.idpregunta=' . $id)
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



	public function actionFindbyukjson()
	{
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Pregunta_respuestas'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Pregunta_respuestas'];
			$pregunta_respuestas=Pregunta_respuestas::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($pregunta_respuestas!=null &&  $_GET['idpregunta_respuestas']!=$pregunta_respuestas['idpregunta_respuestas'])
				$jsonResult = array('valid' => false);
			return $jsonResult;
		}
	}
	/**
	 * Finds the Pregunta_respuestas model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Pregunta_respuestas the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Pregunta_respuestas::findOne($id)) !== null) {
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
					->from('pregunta_respuestas')
					->orderBy(array('pregunta_respuestas.idpregunta_respuestas'=>SORT_ASC))
					->join('inner join','pregunta','pregunta_respuestas.id_pregunta=pregunta.idpregunta')
					->join('inner join','respuesta','pregunta_respuestas.id_respuesta=respuesta.idrespuesta')
					->select('pregunta_respuestas.*,pregunta.pregunta ,respuesta.respuesta ,pregunta_respuestas.pregunta_respuestas as text ,pregunta_respuestas.idpregunta_respuestas as id ')
					->where('pregunta_respuestas.id_respuesta LIKE '."'%".$like."%'")
					->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
				$rows = $query
					->from('pregunta_respuestas')
					->join('inner join','pregunta','pregunta_respuestas.id_pregunta=pregunta.idpregunta')
					->join('inner join','respuesta','pregunta_respuestas.id_respuesta=respuesta.idrespuesta')
					->select(["pregunta.* , GROUP_CONCAT(pregunta_respuestas.id_respuesta SEPARATOR ',')  as resp_array"])->distinct(true)->groupBy('pregunta.idpregunta')
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
	 * Load  from Excel a list of the Pregunta_respuestas table based on its primary key value.
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
					$idpregunta_respuestas = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idpregunta_respuestas)) {
						$idpregunta_respuestas = $worksheet->getCell('A' . $row)->getValue();
						$id_respuesta = $worksheet->getCell('B' . $row)->getValue();
						$id_pregunta = $worksheet->getCell('C' . $row)->getValue();
						$pregunta_respuestas = new Pregunta_respuestas();
						$pregunta_respuestas->idpregunta_respuestas  =  $idpregunta_respuestas;
						$pregunta_respuestas->id_respuesta  =  $id_respuesta;
						$pregunta_respuestas->id_pregunta  =  $id_pregunta;
						$pregunta_respuestas->save();
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
	 * Create a Excel file  from a list of the Pregunta_respuestas
	 * @return boolean the list is created
	 */
	public  function actionExcel()
	{
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

		$pregunta_respuestaslist=json_decode($_POST['pregunta_respuestas_export']);
		$objPHPExcel = new \PHPExcel();
		$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
		$objPHPExcel->getProperties()->setCreator(Yii::$app->id)
			->setLastModifiedBy($name_user)
			->setTitle('Listado de pregunta_respuestas')
			->setSubject('Listado de pregunta_respuestas')
			->setDescription('Documento con el listado de pregunta_respuestas segun '.Yii::$app->id);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idpregunta_respuestas');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'id_respuesta');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'id_pregunta');
		$i=2;
		foreach($pregunta_respuestaslist as  $pregunta_respuestas)
		{
			$pregunta_respuestas=(object)$pregunta_respuestas;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $pregunta_respuestas->idpregunta_respuestas);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $pregunta_respuestas->id_respuesta);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $pregunta_respuestas->id_pregunta);
			$i++;
		}

		$exceklib= new \PHPExcel_IOFactory();
		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
		header("Content-Disposition: attachment; filename=\"$pregunta_respuestas.xls\"");
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
			$rows = Pregunta_respuestas::find()->all();
			return $rows;
		}
	}
}
?>
