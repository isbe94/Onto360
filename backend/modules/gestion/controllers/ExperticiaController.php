<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\gestion\controllers;

use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\web\View;use yii\base\Exception;

use backend\modules\gestion\models\Experticia;
use backend\modules\gestion\models\ExperticiaSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/** 
 * experticiaimplenta las acciones del modelo experticia .
 *
 */
class ExperticiaController extends Controller
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
     * Lists all Experticia models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->request->getIsAjax()) 
			{
				$this->actionAssetPluginLoad();
		 		//Datos de la Tabla Experticia
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_init.js');
		 		return $this->getView()->render('@backend/modules/gestion/views/experticia/index',array('index'=>false));
			}
			else
			 {
				$this->actionAssetPlugin();
		 //Datos de la Tabla Experticia
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_actions_ajax.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

        		return $this->render('index', [
					'index'=>true
        		]);
    		 }
	}
/**
     * Displays a single Experticia model.
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
     * Creates a new Experticia model.
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
            $model = new Experticia();
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
				$model = new Experticia();
		 		//Datos de la Tabla Experticia
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/experticia/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
            $model = new Experticia();
            if ($post){
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$result=$model->save();
                    if($result){
						  if (strpos($_POST['btnsubmit'], 'new') == -1)
                        return $this->redirect(Yii::$app->homeUrl.'gestion/experticia');
						    else
                        return $this->redirect(Yii::$app->homeUrl.'gestion/experticia/create');
						}
                    else
						{
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idexperticia'=>'',
            		 ]);
					}
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idexperticia'=>'',
            		 ]);
                }
            }
		}else{
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Experticia
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
							'message'=>'',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idexperticia'=>'',
            		 ]);
                }
	 	}
	}
/**
     * Update a Experticia model.
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

					$experticia= (object)Yii::$app->request->post('Experticia');
            		$model =  $this->findModel($experticia->idexperticia);
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
				$model = new Experticia();
		 		//Datos de la Tabla Experticia
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/experticia/kendo_experticia_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/experticia/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
			if(!$post){
			if(isset($_GET['id']))
			{
				$condition =array(
					'idexperticia'=>$_GET['id']
						);
            	$model = Experticia::findOne($condition);

				if(is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl().'gestion/experticia');
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Experticia
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
									'message'=>'',
                					'model' => $model,
									'action' => $action,
									'textaction'=>'Actualizar',
									'idexperticia'=>'Experticia[idexperticia]',
            		 		]);
			}
			else
				return $this->redirect(Yii::$app->homeUrl.'gestion/experticia');


            }
				//Request por post
			$idexperticia=Yii::$app->request->post('Experticia')['idexperticia'];
					$condition =array(
						'idexperticia'=>$idexperticia
						);
			$model=Experticia::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$model->update();
                       return $this->redirect(Yii::$app->homeUrl.'gestion/experticia');
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la actualizacion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Actualizar',
							'idexperticia'=>'Experticia[idexperticia]',
            		 ]);
                }
            }
	 	}
		//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'gestion/experticia');
	}
/**
     * Deletes an existing Experticia model.
     * If deletion is successful, return a message in json format with ok response.
     * @return josn format message
     */
    public function actionDelete()
    {
        if($_POST['array']){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $array= json_decode($_POST['array']);
                try {
            foreach ($array as $experticia) {
                    $id=array(
                        'idexperticia'=>$experticia->idexperticia
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El experticia  fue eliminado con exito');
                }            }
			catch (\Exception $e) {
                    $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
                }
            return $jsonResult;
        }
    }
/**
	 * Find a single Experticia model.
	 * @return mixed
	 */
public function actionFindbyukjson()
	{
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Experticia'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Experticia'];
			$experticia=Experticia::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($experticia!=null &&  $_GET['idexperticia']!=$experticia['idexperticia'])
				$jsonResult = array('valid' => false);
			return $jsonResult;
		}
	}
/**
     * Finds the Experticia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Experticia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Experticia::findOne($id)) !== null) {
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
		 				->from('experticia')
		 				->orderBy(array('experticia.idexperticia'=>SORT_ASC))
			 	->select('experticia.*,experticia.grado_experiencia as text ,experticia.idexperticia as id ')
			 	->where('experticia.grado_experiencia LIKE '."'%".$like."%'")
			 	->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
		 	$rows = $query
		 		->from('experticia')
		 		->orderBy(array('experticia.idexperticia'=>SORT_ASC))
			 	->select('experticia.*')
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
     * Load  from Excel a list of the Experticia table based on its primary key value.
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
					$idexperticia = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idexperticia)) {
						$idexperticia = $worksheet->getCell('A' . $row)->getValue();
						$grado_experiencia = $worksheet->getCell('B' . $row)->getValue();
						$experticia = new Experticia();
						$experticia->idexperticia  =  $idexperticia;
						$experticia->grado_experiencia  =  $grado_experiencia;
						$experticia->save();
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
     * Create a Excel file  from a list of the Experticia 
     * @return boolean the list is created
     */
    public  function actionExcel()
    {
			include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
        	include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

			$experticialist=json_decode($_POST['experticia_export']);
			$objPHPExcel = new \PHPExcel();
        	$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
			        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
				->setLastModifiedBy($name_user)
				->setTitle('Listado de Experticia')
				->setSubject('Listado de Experticia')
				->setDescription('Documento con el listado de Experticias segun '.Yii::$app->id);
        		$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idexperticia');
				$objPHPExcel->getActiveSheet()->setCellValue('B1', 'grado_experiencia');
				$i=2;
				foreach($experticialist as  $experticia) 
					{	
						$experticia=(object)$experticia;
						$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $experticia->idexperticia);
						$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $experticia->grado_experiencia);
						$i++;
					}

	 			$exceklib= new \PHPExcel_IOFactory();
        		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
				header("Content-Disposition: attachment; filename=\"Listado_experticia.xls\"");
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
            $rows = Experticia::find()->all();
            return $rows;
        }
    }
}
 ?>
