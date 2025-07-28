<?php
/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/

namespace backend\modules\nomencladores\controllers;

use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\web\View;use yii\base\Exception;

use backend\modules\nomencladores\models\Clasificacion;
use backend\modules\nomencladores\models\ClasificacionSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * clasificacionImplementa las acciones de la controladora del modelo clasificacion .
 *
 */
class ClasificacionController extends Controller
{


	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['list','list_json','findbyukjson','update','index','view','create','delete','load_excel','excel'],
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
//		AppAssetPlugins::setPlugins_Ladda($this->view);
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
		AppAssetPlugins::getPlugins_Noty($this->view);			    AppAssetPlugins::getPlugins_Ladda($this->view);
		AppAssetPlugins::getPlugins_ComponentsCss($this->view);
		array_push($this->view->js,Yii::$app->homeUrl.'/js/validation/validation.js');

	}

	/**
	 * Lists all Clasificacion models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		if (Yii::$app->request->getIsAjax())
		{
			$this->actionAssetPluginLoad();
			//Datos de la Tabla Clasificacion
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_components.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_actions_ajax.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_init.js');
			return $this->getView()->render('@backend/modules/nomencladores/views/clasificacion/index',array('index'=>false));
		}
		else
		{
			$this->actionAssetPlugin();
			//Datos de la Tabla Clasificacion
			$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_components.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_actions_ajax.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_init.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

			return $this->render('index', [
				'index'=>true
			]);
		}
	}
	/**
	 * Displays a single Clasificacion model.
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
	 * Creates a new Clasificacion model.
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
				$model = new Clasificacion();
				if ($model->load(Yii::$app->request->post())) {
					try {
						$result=$model->save();
						if($result)
							$jsonResult = array('success' => true, 'message' => '');
						else
							$jsonResult = array('success' => false, 'message' => 'Ocurrió un error en la insercion verifique bien los datos');
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
				$model = new Clasificacion();
				//Datos de la Tabla Clasificacion
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_components.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_actions_ajax.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_init.js');
				return $this->getView()->render('@backend/modules/nomencladores/views/clasificacion/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
		}
		else
		{
			$model = new Clasificacion();
			if ($post){
				if ($model->load(Yii::$app->request->post())) {
					try {

						$result=$model->save();
						if($result){
							if (strpos($_POST['btnsubmit'], 'new') == -1)
								return $this->redirect(Yii::$app->homeUrl.'nomencladores/clasificacion');
							else
								return $this->redirect(Yii::$app->homeUrl.'nomencladores/clasificacion/create');
						}
						else
						{
							return $this->render('form', [
								'message'=>'Ocurrió un error en la insercion del elemento',
								'model' => $model,
								'action' => $action,
								'textaction'=>'Insertar',
								'idclasificacion'=>'',
							]);
						}
					} catch (\Exception $e) {
						return $this->render('form', [
							'message'=>'Ocurrió un error en la insercion del elemento',
							'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idclasificacion'=>'',
						]);
					}
				}
			}
			else{
				$this->actionAssetPlugin();
				//Datos de la Tabla Clasificacion
				$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_components.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
					'message'=>'',
					'model' => $model,
					'action' => $action,
					'textaction'=>'Insertar',
					'idclasificacion'=>'',
				]);
			}
		}
	}


	/**
	 * Update a Clasificacion model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
//

	public function actionUpdate()
	{
		$post=count(Yii::$app->request->post())>0;

		$action='update';
		if (Yii::$app->request->getIsAjax() ) {
			if($post)
			{
				\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

				$clasificacion= (object)Yii::$app->request->post('Clasificacion');
				$model =  $this->findModel($clasificacion->idclasificacion);
				if ($model->load(Yii::$app->request->post())) {
					try {
						$result=$model->update();
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
				$model = new Clasificacion();
				//Datos de la Tabla Clasificacion
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_components.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_actions_ajax.js');
				array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_init.js');
				return $this->getView()->render('@backend/modules/nomencladores/views/clasificacion/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
		}
		else
		{
			if(!$post){
				if(isset($_GET['id']))
				{
					$condition =array(
						'idclasificacion'=>$_GET['id']
					);
					$model = Clasificacion::findOne($condition);

					if(is_null($model))
						return $this->redirect(Yii::$app->getHomeUrl().'nomencladores/clasificacion');
					$this->actionAssetPlugin();
					//Datos de la Tabla Clasificacion
					$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_components.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_actions.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_init.js',
						['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
						'message'=>'',
						'model' => $model,
						'action' => $action,
						'textaction'=>'Actualizar',
						'idclasificacion'=>'Clasificacion[idclasificacion]',
					]);
				}
				else
					return $this->redirect(Yii::$app->homeUrl.'nomencladores/clasificacion');


			}
			//Request por post
			$idclasificacion=Yii::$app->request->post('Clasificacion')['idclasificacion'];
			$condition =array(
				'idclasificacion'=>$idclasificacion
			);
			$model=Clasificacion::findOne($condition);
			if ($model->load(Yii::$app->request->post())) {
				try {

					$model->update();
					return $this->redirect(Yii::$app->homeUrl.'nomencladores/clasificacion');
				} catch (\Exception $e) {
					return $this->render('form', [
						'message'=>'Ocurrió un error en la actualización del elemento',
						'model' => $model,
						'action' => $action,
						'textaction'=>'Actualizar',
						'idclasificacion'=>'Clasificacion[idclasificacion]',
					]);
				}
			}
		}
		//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'nomencladores/clasificacion');
	}
	/**
	 * Deletes an existing Clasificacion model.
	 * If deletion is successful, return a message in json format with ok response.
	 * @return array format message
	 */
	public function actionDelete()
	{
		if($_POST['array']){
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$jsonResult=[];
			$array= json_decode($_POST['array']);
			try {
				foreach ($array as $clasificacion) {
					$id=array(
						'idclasificacion'=>$clasificacion->idclasificacion
					);
					$this->findModel($id)->delete();
					$jsonResult = array('success' => true, 'message' => 'El clasificacion  fue eliminado con exito');
				}            }
			catch (\Exception $e) {
				$jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
			}
			return $jsonResult;
		}
	}
	/**
	 * Finds the Clasificacion model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Clasificacion the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Clasificacion::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('LA pagina solicitada no existe');
		}
	}
	/**
	 * Load  from Excel a list of the Clasificacion table based on its primary key value.
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
					$idclasificacion = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idclasificacion)) {
						$idclasificacion = $worksheet->getCell('A' . $row)->getValue();
						$clasificacion = $worksheet->getCell('B' . $row)->getValue();
						$clasificacion = new Clasificacion();
						$clasificacion->idclasificacion  =  $idclasificacion;
						$clasificacion->clasificacion  =  $clasificacion;
						$clasificacion->save();
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
	 * Create a Excel file  from a list of the Clasificacion
	 * @return boolean the list is created
	 */
	public  function actionExcel()
	{
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

		$clasificacionlist=json_decode($_POST['clasificacion_export']);
		$objPHPExcel = new \PHPExcel();
		$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
		$objPHPExcel->getProperties()->setCreator(Yii::$app->id)
			->setLastModifiedBy($name_user)
			->setTitle('Listado de Clasificacion')
			->setSubject('Listado de Clasificacion')
			->setDescription('Documento con el listado de Clasificacions segun '.Yii::$app->id);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idclasificacion');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'clasificacion');
		$i=2;
		foreach($clasificacionlist as  $clasificacion)
		{
			$clasificacion=(object)$clasificacion;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $clasificacion->idclasificacion);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $clasificacion->clasificacion);
			$i++;
		}

		$exceklib= new \PHPExcel_IOFactory();
		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
		header("Content-Disposition: attachment; filename=\"Listado_clasificacion.xls\"");
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
			$rows = Clasificacion::find()->all();
			return $rows;
		}
	}


//	public function actionList_grid()
//	{
//		if (Yii::$app->request->getIsAjax())
//		{
//			$query= new Query();
//			$rows=$query
//				->from('clasificacion')
//				->orderBy(array('clasificacion.idclasificacion'=>SORT_ASC))
//				->select('clasificacion.*')
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

//	public function actionList_combo()
//	{
//		if (Yii::$app->request->getIsAjax())
//		{
//			$query= new Query();
//			$rows='';
//			$like='';
//			if(isset($_GET['q']))
//				$like=$_GET['q'];
//			$rows = $query
//				->from('clasificacion')
//				->orderBy(array('clasificacion.idclasificacion'=>SORT_ASC))
//				->select('clasificacion.*,clasificacion.clasificacion as text ,clasificacion.idclasificacion as id ')
//				->where('clasificacion.clasificacion LIKE '."'%".$like."%'")
//				->all();
//			$result['data']=$rows;
//			$rows=$result;
//
//			if (isset($_GET['callback'])) {
//				\Yii::$app->response->format = \yii\web\Response::FORMAT_JSONP;
//				$callback = $_GET['callback'];
//				return ['callback' => $callback, 'data' => $rows];
//			} else {
//				\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//				return $rows;
//			}
//		}
//	}

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
					->from('clasificacion')
					->orderBy(array('clasificacion.idclasificacion'=>SORT_ASC))
					->select('clasificacion.*,clasificacion.clasificacion as text ,clasificacion.idclasificacion as id ')
					->where('clasificacion.clasificacion LIKE '."'%".$like."%'")
					->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
				$rows = $query
					->from('clasificacion')
					->orderBy(array('clasificacion.idclasificacion'=>SORT_ASC))
					->select('clasificacion.*')
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
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Clasificacion'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Clasificacion'];
			$clasificacion=Clasificacion::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($clasificacion!=null &&  $_GET['idclasificacion']!=$clasificacion['idclasificacion'])
				$jsonResult = array('valid' => false);
			return $jsonResult;

		}
	}















































































}
?>
