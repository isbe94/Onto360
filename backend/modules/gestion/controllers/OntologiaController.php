<?php
/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\controllers;

use backend\modules\gestion\models\Lenguaje;
use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\View;use yii\base\Exception;

use backend\modules\gestion\models\Ontologia;
use backend\modules\gestion\models\OntologiaSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ontologiaImplementa las acciones de la controladora del modelo ontologia .
 *
 */
class OntologiaController extends Controller
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
		AppAssetPlugins::getPlugins_Noty($this->view);			    AppAssetPlugins::getPlugins_Ladda($this->view);
		AppAssetPlugins::getPlugins_ComponentsCss($this->view);
		AppAssetPlugins::getPlugins_Select2($this->view);
		array_push($this->view->js,Yii::$app->homeUrl.'/js/validation/validation.js');

	}

	/**
	 * Lists all Ontologia models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		if (Yii::$app->request->getIsAjax())
		{
			$this->actionAssetPluginLoad();
			//Datos de la Tabla Ontologia
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia_components.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia_actions_ajax.js');
			array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia_init.js');
			return $this->getView()->render('@backend/modules/gestion/views/ontologia/index',array('index'=>false));
		}
		else
		{
			$this->actionAssetPlugin();
			//Datos de la Tabla Ontologia
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_components.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_actions_ajax.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
			$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_init.js',
				['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

			return $this->render('index', [
				'index'=>true
			]);
		}
	}
	/**
	 * Displays a single Ontologia model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	public function actionCreate()
	{
		$post = count(Yii::$app->request->post()) > 0;

		$action = 'create';
		if (Yii::$app->request->getIsAjax()) {
			if ($post) {
				\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
				$ontologia = array('Ontologia' => Json::decode(Yii::$app->request->post('Ontologia')));
				$model = new Ontologia();
				if ($model->load($ontologia)) {
					try {

						$model->fichero = 'ontologia.owl';
						$l=explode('.',$ontologia['Ontologia']['fichero']);
						$leng=array_pop($l);
						$lenguaje=Lenguaje::find()->where('lenguaje.lenguaje LIKE '."'%".$leng."%'")->one();
						$model->id_lenguaje=$lenguaje->idlenguaje;
						$result = $model->save();
						if (isset($_FILES['fichero'])) {
							$fichero = (object)$_FILES['fichero'];
							$rutaonto = Yii::$app->params['fichero_onto'];
							$pos = strpos($fichero->name, '.');
							$ext = str_split($fichero->name, $pos + 1)[1];
							$name_fichero = 'ontologia_' . $model->primaryKey;
							$fichero_original = $rutaonto . $name_fichero . '.' . $ext;
							move_uploaded_file($fichero->tmp_name, $fichero_original); //Movemos el archivo temporal a la ruta especificada
							$model->fichero = $name_fichero . '.' . $ext;
						}

						$result = $model->save();

						if ($result)
							$jsonResult = array('success' => true, 'message' => '');
						else
							$jsonResult = array('success' => false, 'message' => 'Ocurrio un error en la inserción verifique bien los datos');
					} catch (Exception $e) {
						$jsonResult = array('success' => false, 'message' => '');
					}
					return $jsonResult;
				}
			} else {
				$this->actionAssetPluginLoad();
				$action = 'create';
				$model = new Ontologia();
				//Datos de la Tabla Ontologia
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_components.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_actions_ajax.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/ontologia/form', array('action' => $action, 'model' => $model, 'checked' => '', 'required' => 'required'));
			}
		} else {
			$model = new Ontologia();
			if ($post) {
				if ($model->load(Yii::$app->request->post())) {
					try {

						$result = $model->save();
						if ($result) {
							if (strpos($_POST['btnsubmit'], 'new') == -1)
								return $this->redirect(Yii::$app->homeUrl . 'gestion/ontologia');
							else
								return $this->redirect(Yii::$app->homeUrl . 'gestion/ontologia/create');
						} else {
							return $this->render('form', [
								'message' => 'Ocurrio un error en la insercion del elemento',
								'model' => $model,
								'action' => $action,
								'textaction' => 'Insertar',
								'idontologia' => '',
							]);
						}
					} catch (\Exception $e) {
						return $this->render('form', [
							'message' => 'Ocurrio un error en la insercion del elemento',
							'model' => $model,
							'action' => $action,
							'textaction' => 'Insertar',
							'idontologia' => '',
						]);
					}
				}
			} else {
				$this->actionAssetPlugin();
				//Datos de la Tabla Ontologia
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_components.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_actions.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
				$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_init.js',
					['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

				return $this->render('form', [
					'message' => '',
					'model' => $model,
					'action' => $action,
					'textaction' => 'Insertar',
					'idontologia' => '',
				]);
			}
		}
	}

	public function actionUpdate()
	{
		$post = count(Yii::$app->request->post()) > 0;

		$action = 'update';
		if (Yii::$app->request->getIsAjax()) {
			if (count(Yii::$app->request->post()) > 0) {
				\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
				$ontologia = array('Ontologia' => Json::decode(Yii::$app->request->post('Ontologia')));
				$model = Ontologia::findOne($ontologia['Ontologia']['idontologia']);

				if ($model->load($ontologia)) {
					try {
						$result = $model->save();
						if (isset($_FILES['fichero'])) {
							$fichero = (object)$_FILES['fichero'];
							$rutaonto = Yii::$app->params['fichero_onto'];
							$pos = strpos($fichero->name, '.');
							$ext = str_split($fichero->name, $pos + 1)[1];
							$name_fichero = 'ontologia_' . $model->primaryKey;
							$fichero_original = $rutaonto . $name_fichero . '.' . $ext;
							move_uploaded_file($fichero->tmp_name, $fichero_original); //Movemos el archivo temporal a la ruta especificada
							$model->fichero = $name_fichero . '.' . $ext;


						}

						$result = $model->save();
						$jsonResult = array('success' => true, 'message' => '');
					} catch (\Exception $e) {
						$jsonResult = array('success' => false, 'message' => '');
					}
					return $jsonResult;
				}

			} else {
				$this->actionAssetPluginLoad();
				$model = new Ontologia();
				//Datos de la Tabla Ontologia
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_components.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_actions_ajax.js');
				array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/ontologia/kendo_ontologia_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/ontologia/form', array('action' => $action, 'model' => $model, 'checked' => '', 'required' => 'required'));
			}
		}
		else {
			if (!$post) {
				if (isset($_GET['id'])) {
					$condition = array(
						'idontologia' => $_GET['id']
					);
					$model = Ontologia::findOne($condition);

					if (is_null($model))
						return $this->redirect(Yii::$app->getHomeUrl() . 'gestion/ontologia');
					$this->actionAssetPlugin();
					//Datos de la Tabla Ontologia
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/clasificacion/kendo_clasificacion_datasource.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_components.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_actions.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
					$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_init.js',
						['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

					return $this->render('form', [
						'message' => '',
						'model' => $model,
						'action' => $action,
						'textaction' => 'Actualizar',
						'idontologia' => 'Ontologia[idontologia]',
					]);
				} else
					return $this->redirect(Yii::$app->homeUrl . 'gestion/ontologia');


			}
			//Request por post
			$idontologia = Yii::$app->request->post('Ontologia')['idontologia'];
			$condition = array(
				'idontologia' => $idontologia
			);
			$model = Ontologia::findOne($condition);
			if ($model->load(Yii::$app->request->post())) {
				try {

					$model->save();
					return $this->redirect(Yii::$app->homeUrl . 'gestion/ontologia');
				} catch (\Exception $e) {
					return $this->render('form', [
						'message' => 'Ocurrió un error en la actualización del elemento',
						'model' => $model,
						'action' => $action,
						'textaction' => 'Actualizar',
						'idontologia' => 'Ontologia[idontologia]',
					]);
				}
			}
		}
		//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl . 'gestion/ontologia');
	}
	/**
	 * Deletes an existing Ontologia model.
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
				foreach ($array as $ontologia) {
					$id=array(
						'idontologia'=>$ontologia->idontologia
					);
					$this->findModel($id)->delete();
					$jsonResult = array('success' => true, 'message' => 'El ontologia  fue eliminado con exito');
				}            }
			catch (\Exception $e) {
				$jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
			}
			return $jsonResult;
		}
	}
	/**
	 * Finds the Ontologia model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Ontologia the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Ontologia::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('LA pagina solicitada no existe');
		}
	}
	/**
	 * Load  from Excel a list of the Ontologia table based on its primary key value.
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
					$idontologia = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idontologia)) {
						$idontologia = $worksheet->getCell('A' . $row)->getValue();
						$dominio = $worksheet->getCell('B' . $row)->getValue();
						$fichero = $worksheet->getCell('C' . $row)->getValue();
						$nombre = $worksheet->getCell('D' . $row)->getValue();
						$id_tecnologia = $worksheet->getCell('E' . $row)->getValue();
						$ontologia = new Ontologia();
						$ontologia->idontologia  =  $idontologia;
						$ontologia->dominio  =  $dominio;
						$ontologia->fichero  =  $fichero;
						$ontologia->nombre  =  $nombre;
						$ontologia->id_tecnologia  =  $id_tecnologia;
						$ontologia->save();
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
	 * Create a Excel file  from a list of the Ontologia
	 * @return boolean the list is created
	 */
	public  function actionExcel()
	{
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
		include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

		$ontologialist=json_decode($_POST['ontologia_export']);
		$objPHPExcel = new \PHPExcel();
		$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
		$objPHPExcel->getProperties()->setCreator(Yii::$app->id)
			->setLastModifiedBy($name_user)
			->setTitle('Listado de Ontologia')
			->setSubject('Listado de Ontologia')
			->setDescription('Documento con el listado de Ontologias segun '.Yii::$app->id);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idontologia');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'dominio');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'fichero');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'nombre');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'id_tecnologia');
		$i=2;
		foreach($ontologialist as  $ontologia)
		{
			$ontologia=(object)$ontologia;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $ontologia->idontologia);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $ontologia->dominio);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $ontologia->fichero);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $ontologia->nombre);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $ontologia->id_tecnologia);
			$i++;
		}

		$exceklib= new \PHPExcel_IOFactory();
		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
		header("Content-Disposition: attachment; filename=\"Listado_ontologia.xls\"");
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
			$rows = Ontologia::find()->all();
			return $rows;
		}
	}

	public function actionFindbyukjson()
	{
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Ontologia'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Ontologia'];
			$ontologia=Ontologia::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($ontologia!=null &&  $_GET['idontologia']!=$ontologia['idontologia'])
				$jsonResult = array('valid' => false);
			return $jsonResult;

		}
	}

	public function actionList_json()
	{

		if (Yii::$app->request->getIsAjax()) {
			$query = new Query();
			$rows = '';
			if (isset($_GET['combo'])) {
				$like = '';
				if (isset($_GET['q']))
					$like = $_GET['q'];
				$rows = $query
					->from('ontologia')
					->orderBy(array('ontologia.idontologia'=>SORT_ASC))
					->join('left outer join','lenguaje','ontologia.id_lenguaje=lenguaje.idlenguaje')
					->select('ontologia.*,lenguaje.lenguaje ,ontologia.nombre as text ,ontologia.idontologia as id ')
					->where('ontologia.nombre LIKE '."'%".$like."%'")
					->all();
				$result['data'] = $rows;
				$rows = $result;
			} else
				$rows = $query
					->from('ontologia')
					->orderBy(array('ontologia.idontologia'=>SORT_ASC))
					->join('left outer join','lenguaje','ontologia.id_lenguaje=lenguaje.idlenguaje')
					->select('ontologia.*,lenguaje.lenguaje ')
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






































}
?>
