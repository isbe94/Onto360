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

use backend\modules\gestion\models\Tecnologia;
use backend\modules\gestion\models\TecnologiaSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/** 
 * tecnologiaimplenta las acciones del modelo tecnologia .
 *
 */
class TecnologiaController extends Controller
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
     * Lists all Tecnologia models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->request->getIsAjax()) 
			{
				$this->actionAssetPluginLoad();
		 		//Datos de la Tabla Tecnologia
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_init.js');
		 		return $this->getView()->render('@backend/modules/gestion/views/tecnologia/index',array('index'=>false));
			}
			else
			 {
				$this->actionAssetPlugin();
		 //Datos de la Tabla Tecnologia
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_actions_ajax.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

        		return $this->render('index', [
					'index'=>true
        		]);
    		 }
	}
/**
     * Displays a single Tecnologia model.
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
     * Creates a new Tecnologia model.
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
            $model = new Tecnologia();
				$tecnologia= (object)Yii::$app->request->post('Tecnologia');
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
				$model = new Tecnologia();
		 		//Datos de la Tabla Tecnologia
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/tecnologia/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
            $model = new Tecnologia();
            if ($post){
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$result=$model->save();
                    if($result){
						  if (strpos($_POST['btnsubmit'], 'new') == -1)
                        return $this->redirect(Yii::$app->homeUrl.'gestion/tecnologia');
						    else
                        return $this->redirect(Yii::$app->homeUrl.'gestion/tecnologia/create');
						}
                    else
						{
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idtecnologia'=>'',
            		 ]);
					}
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idtecnologia'=>'',
            		 ]);
                }
            }
		}else{
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Tecnologia
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
							'message'=>'',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idtecnologia'=>'',
            		 ]);
                }
	 	}
	}
/**
     * Update a Tecnologia model.
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

					$tecnologia= (object)Yii::$app->request->post('Tecnologia');
            		$model =  $this->findModel($tecnologia->idtecnologia);
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
				$model = new Tecnologia();
		 		//Datos de la Tabla Tecnologia
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/tecnologia/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
			if(!$post){
			if(isset($_GET['id']))
			{
				$condition =array(
					'idtecnologia'=>$_GET['id']
						);
            	$model = Tecnologia::findOne($condition);

				if(is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl().'gestion/tecnologia');
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Tecnologia
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/tecnologia/kendo_tecnologia_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
									'message'=>'',
                					'model' => $model,
									'action' => $action,
									'textaction'=>'Actualizar',
									'idtecnologia'=>'Tecnologia[idtecnologia]',
            		 		]);
			}
			else
				return $this->redirect(Yii::$app->homeUrl.'gestion/tecnologia');


            }
				//Request por post
			$idtecnologia=Yii::$app->request->post('Tecnologia')['idtecnologia'];
					$condition =array(
						'idtecnologia'=>$idtecnologia
						);
			$model=Tecnologia::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$model->save();
                       return $this->redirect(Yii::$app->homeUrl.'gestion/tecnologia');
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la actualizacion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Actualizar',
							'idtecnologia'=>'Tecnologia[idtecnologia]',
            		 ]);
                }
            }
	 	}
		//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'gestion/tecnologia');
	}
/**
     * Deletes an existing Tecnologia model.
     * If deletion is successful, return a message in json format with ok response.
     * @return josn format message
     */
    public function actionDelete()
    {
        if($_POST['array']){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $array= json_decode($_POST['array']);
                try {
            foreach ($array as $tecnologia) {
                    $id=array(
                        'idtecnologia'=>$tecnologia->idtecnologia
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El tecnologia  fue eliminado con exito');
                }            }
			catch (\Exception $e) {
                    $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
                }
            return $jsonResult;
        }
    }
/**
	 * Find a single Tecnologia model.
	 * @return mixed
	 */
public function actionFindbyukjson()
	{
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Tecnologia'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Tecnologia'];
			$tecnologia=Tecnologia::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($tecnologia!=null &&  $_GET['idtecnologia']!=$tecnologia['idtecnologia'])
				$jsonResult = array('valid' => false);
			return $jsonResult;
		}
	}
/**
     * Finds the Tecnologia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tecnologia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tecnologia::findOne($id)) !== null) {
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
		 				->from('tecnologia')
		 				->orderBy(array('tecnologia.idtecnologia'=>SORT_ASC))
			 	->select('tecnologia.*,tecnologia.tecnologia as text ,tecnologia.idtecnologia as id ')
			 	->where('tecnologia.tecnologia LIKE '."'%".$like."%'")
			 	->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
		 	$rows = $query
		 		->from('tecnologia')
		 		->orderBy(array('tecnologia.idtecnologia'=>SORT_ASC))
			 	->select('tecnologia.*')
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
     * Load  from Excel a list of the Tecnologia table based on its primary key value.
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
					$idtecnologia = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idtecnologia)) {
						$idtecnologia = $worksheet->getCell('A' . $row)->getValue();
						$tecnologia = $worksheet->getCell('B' . $row)->getValue();
						$tecnologia = new Tecnologia();
						$tecnologia->idtecnologia  =  $idtecnologia;
						$tecnologia->tecnologia  =  $tecnologia;
						$tecnologia->save();
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
     * Create a Excel file  from a list of the Tecnologia 
     * @return boolean the list is created
     */
    public  function actionExcel()
    {
			include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
        	include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

			$tecnologialist=json_decode($_POST['tecnologia_export']);
			$objPHPExcel = new \PHPExcel();
        	$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
			        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
				->setLastModifiedBy($name_user)
				->setTitle('Listado de Tecnologia')
				->setSubject('Listado de Tecnologia')
				->setDescription('Documento con el listado de Tecnologias segun '.Yii::$app->id);
        		$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idtecnologia');
				$objPHPExcel->getActiveSheet()->setCellValue('B1', 'tecnologia');
				$i=2;
				foreach($tecnologialist as  $tecnologia) 
					{	
						$tecnologia=(object)$tecnologia;
						$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $tecnologia->idtecnologia);
						$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $tecnologia->tecnologia);
						$i++;
					}

	 			$exceklib= new \PHPExcel_IOFactory();
        		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
				header("Content-Disposition: attachment; filename=\"Listado_tecnologia.xls\"");
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
            $rows = Tecnologia::find()->all();
            return $rows;
        }
    }
}
 ?>
