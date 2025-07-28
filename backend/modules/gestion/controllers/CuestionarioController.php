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

use backend\modules\gestion\models\Cuestionario;
use backend\modules\gestion\models\CuestionarioSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * cuestionarioimplenta las acciones del modelo cuestionario .
 *
 */
class CuestionarioController extends Controller
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
	 * Lists all Cuestionario models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		if (Yii::$app->request->getIsAjax())
		{
			$this->actionAssetPluginLoad();
			//Datos de la Tabla Cuestionario
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_components.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_actions_ajax.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_init.js');
			return $this->getView()->render('@backend/modules/gestion/views/cuestionario/index',array('index'=>false));
		}
		else
		{
			$this->actionAssetPlugin();
			//Datos de la Tabla Cuestionario
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_components.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_actions_ajax.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_init.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

			return $this->render('index', [
				'index'=>true
			]);
		}
	}
	/**
	 * Displays a single Cuestionario model.
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
	 * Creates a new Cuestionario model.
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
				$model = new Cuestionario();
				$cuestionario= (object)Yii::$app->request->post('Cuestionario');
				if ($model->load(Yii::$app->request->post())) {
					try {
						if (isset($_POST['Cuestionario'])) {
							$cuest = new Cuestionario();
							$cuest->id_pregunta = $_POST['Cuestionario']['id_pregunta'];
							$cuest->id_respuesta = $_POST['Cuestionario']['id_respuesta'];
							if ($cuestionario->resp_correcta == 1) {
								$cuest->resp_correcta = $_POST['Cuestionario']['id_pregunta'];
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
				$model = new Cuestionario();
				//Datos de la Tabla Cuestionario
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_components.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_actions_ajax.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/cuestionario/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
		}
		else
		{
			$model = new Cuestionario();
			if ($post){
				if ($model->load(Yii::$app->request->post())) {
					try {

						$result=$model->save();
						if($result){
							if (strpos($_POST['btnsubmit'], 'new') == -1)
								return $this->redirect(Yii::$app->homeUrl.'gestion/cuestionario');
							else
								return $this->redirect(Yii::$app->homeUrl.'gestion/cuestionario/create');
						}
						else
						{
							return $this->render('form', [
								'message'=>'Ocurrio un error en la insercion del elemento',
								'model' => $model,
								'action' => $action,
								'textaction'=>'Insertar',
								'idcuestionario'=>'',
							]);
						}
					} catch (\Exception $e) {
						return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
							'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idcuestionario'=>'',
						]);
					}
				}
			}else{
				$this->actionAssetPlugin();
				//Datos de la Tabla Cuestionario
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_components.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
					'message'=>'',
					'model' => $model,
					'action' => $action,
					'textaction'=>'Insertar',
					'idcuestionario'=>'',
				]);
			}
		}
	}
	/**
	 * Update a Cuestionario model.
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
					$cuestionario = (object)Yii::$app->request->post('Cuestionario');
					$cuest_bd=Cuestionario::find()->where(['id_pregunta' => $cuestionario->id_pregunta])->andWhere(['id_respuesta' => $cuestionario->id_respuesta])->one();
					$c_bd=(object)$cuest_bd;
					if (count($cuest_bd)== 1){
						Cuestionario::deleteAll("id_respuesta=" . $c_bd->id_respuesta);
						$cuest = new Cuestionario();
						$cuest->id_pregunta = $cuestionario->id_pregunta;
						$cuest->id_respuesta = $cuestionario->id_respuesta;
						$cuest->resp_correcta=$cuestionario->id_pregunta;
						$result = $cuest->save();
					}
					else{
						$model = (object)Cuestionario::find()->where(['id_pregunta' => $cuestionario->id_pregunta])->one();
						$cuest = new Cuestionario();
						$cuest->id_pregunta = $model->id_pregunta;
						$cuest->id_respuesta = $cuestionario->id_respuesta;
						if ($cuestionario->resp_correcta==0){
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
				$model = new Cuestionario();
				//Datos de la Tabla Cuestionario
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_components.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_actions_ajax.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/cuestionario/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
		}
		else
		{
			if(!$post){
				if(isset($_GET['id']))
				{
					$condition =array(
						'idcuestionario'=>$_GET['id']
					);
					$model = Cuestionario::findOne($condition);

					if(is_null($model))
						return $this->redirect(Yii::$app->getHomeUrl().'gestion/cuestionario');
					$this->actionAssetPlugin();
					//Datos de la Tabla Cuestionario
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/respuesta/kendo_respuesta_datasource.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_datasource.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_components.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_actions.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/cuestionario/kendo_cuestionario_init.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
						'message'=>'',
						'model' => $model,
						'action' => $action,
						'textaction'=>'Actualizar',
						'idcuestionario'=>'Cuestionario[idcuestionario]',
					]);
				}
				else
					return $this->redirect(Yii::$app->homeUrl.'gestion/cuestionario');


			}
//Request por post
			$idcuestionario=Yii::$app->request->post('Cuestionario')['idcuestionario'];
			$condition =array(
				'idcuestionario'=>$idcuestionario
			);
			$model=Cuestionario::findOne($condition);
			if ($model->load(Yii::$app->request->post())) {
				try {

					$model->save();
					return $this->redirect(Yii::$app->homeUrl.'gestion/cuestionario');
				} catch (\Exception $e) {
					return $this->render('form', [
						'message'=>'Ocurrio un error en la actualizacion del elemento',
						'model' => $model,
						'action' => $action,
						'textaction'=>'Actualizar',
						'idcuestionario'=>'Cuestionario[idcuestionario]',
					]);
				}
			}
		}
//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'gestion/cuestionario');
	}
	/**
	 * Deletes an existing Cuestionario model.
	 * If deletion is successful, return a message in json format with ok response.
	 * @return josn format message
	 */
	public function actionDelete()
	{
		if($_POST['array']){
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$array= json_decode($_POST['array']);
			try {
				foreach ($array as $cuestionario) {
					$id=array(
						'idcuestionario'=>$cuestionario->idcuestionario
					);
					$this->findModel($id)->delete();
					$jsonResult = array('success' => true, 'message' => 'El cuestionario  fue eliminado con exito');
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
					Cuestionario::deleteAll("id_pregunta=". $pregunta->idpregunta);
					$jsonResult = array('success' => true, 'message' => 'La pregunta  fue eliminada con exito');
				}
			} catch (\Exception $e) {
				$jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminación');
			}
			return $jsonResult;
		}
	}
	/**
	 * Find a single Cuestionario model.
	 * @return mixed
	 */
	public function actionList_respbycuest($id)
	{

		if (Yii::$app->request->getIsAjax()) {
			$query = new Query();
			$rows = '';
			$rows = $query
				->from('cuestionario')
				->orderBy(array('cuestionario.idcuestionario' => SORT_ASC))
				->join('inner join', 'pregunta', 'cuestionario.id_pregunta=pregunta.idpregunta')
				->join('inner join', 'respuesta', 'cuestionario.id_respuesta=respuesta.idrespuesta')
				->select('cuestionario.* ,pregunta.*,respuesta.* ')
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
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Cuestionario'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Cuestionario'];
			$cuestionario=Cuestionario::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($cuestionario!=null &&  $_GET['idcuestionario']!=$cuestionario['idcuestionario'])
				$jsonResult = array('valid' => false);
			return $jsonResult;
		}
	}
	/**
	 * Finds the Cuestionario model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Cuestionario the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Cuestionario::findOne($id)) !== null) {
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
					->from('cuestionario')
					->orderBy(array('cuestionario.idcuestionario'=>SORT_ASC))
					->join('inner join','pregunta','cuestionario.id_pregunta=pregunta.idpregunta')
					->join('inner join','respuesta','cuestionario.id_respuesta=respuesta.idrespuesta')
					->select('cuestionario.*,pregunta.pregunta ,respuesta.respuesta ,cuestionario.cuestionario as text ,cuestionario.idcuestionario as id ')
					->where('cuestionario.id_respuesta LIKE '."'%".$like."%'")
					->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
				$rows = $query
					->from('cuestionario')
					->join('inner join','pregunta','cuestionario.id_pregunta=pregunta.idpregunta')
					->join('inner join','respuesta','cuestionario.id_respuesta=respuesta.idrespuesta')
					->select(["pregunta.* , GROUP_CONCAT(cuestionario.id_respuesta SEPARATOR ',')  as resp_array"])->distinct(true)->groupBy('pregunta.idpregunta')
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
	 * Load  from Excel a list of the Cuestionario table based on its primary key value.
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
					$idcuestionario = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idcuestionario)) {
						$idcuestionario = $worksheet->getCell('A' . $row)->getValue();
						$id_respuesta = $worksheet->getCell('B' . $row)->getValue();
						$id_pregunta = $worksheet->getCell('C' . $row)->getValue();
						$cuestionario = new Cuestionario();
						$cuestionario->idcuestionario  =  $idcuestionario;
						$cuestionario->id_respuesta  =  $id_respuesta;
						$cuestionario->id_pregunta  =  $id_pregunta;
						$cuestionario->save();
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
	 * Create a Excel file  from a list of the Cuestionario
	 * @return boolean the list is created
	 */
	public  function actionExcel()
	{
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

		$cuestionariolist=json_decode($_POST['cuestionario_export']);
		$objPHPExcel = new \PHPExcel();
		$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
		$objPHPExcel->getProperties()->setCreator(Yii::$app->id)
			->setLastModifiedBy($name_user)
			->setTitle('Listado de Cuestionario')
			->setSubject('Listado de Cuestionario')
			->setDescription('Documento con el listado de Cuestionarios segun '.Yii::$app->id);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idcuestionario');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'id_respuesta');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'id_pregunta');
		$i=2;
		foreach($cuestionariolist as  $cuestionario)
		{
			$cuestionario=(object)$cuestionario;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $cuestionario->idcuestionario);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $cuestionario->id_respuesta);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $cuestionario->id_pregunta);
			$i++;
		}

		$exceklib= new \PHPExcel_IOFactory();
		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
		header("Content-Disposition: attachment; filename=\"Listado_cuestionario.xls\"");
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
			$rows = Cuestionario::find()->all();
			return $rows;
		}
	}
}
?>
