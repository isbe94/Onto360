<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\controllers;

use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\web\View;use yii\base\Exception;

use backend\modules\gestion\models\Pregunta;
use backend\modules\gestion\models\PreguntaSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/** 
 * preguntaimplenta las acciones del modelo pregunta .
 *
 */
class PreguntaController extends Controller
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
     * Lists all Pregunta models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->request->getIsAjax()) 
			{
				$this->actionAssetPluginLoad();
		 		//Datos de la Tabla Pregunta
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_init.js');
		 		return $this->getView()->render('@backend/modules/gestion/views/pregunta/index',array('index'=>false));
			}
			else
			 {
				$this->actionAssetPlugin();
		 //Datos de la Tabla Pregunta
		 		AppAssetPlugins::setPlugins_CKeditor($this->view);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_actions_ajax.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

        		return $this->render('index', [
					'index'=>true
        		]);
    		 }
	}
/**
     * Displays a single Pregunta model.
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
     * Creates a new Pregunta model.
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
            $model = new Pregunta();
				$pregunta= (object)Yii::$app->request->post('Pregunta');
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
				$model = new Pregunta();
		 		//Datos de la Tabla Pregunta
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/pregunta/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
            $model = new Pregunta();
            if ($post){
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$result=$model->save();
                    if($result){
						  if (strpos($_POST['btnsubmit'], 'new') == -1)
                        return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta');
						    else
                        return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta/create');
						}
                    else
						{
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idpregunta'=>'',
            		 ]);
					}
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idpregunta'=>'',
            		 ]);
                }
            }
		}else{
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Pregunta
		 		AppAssetPlugins::setPlugins_CKeditor($this->view);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
							'message'=>'',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idpregunta'=>'',
            		 ]);
                }
	 	}
	}
/**
     * Update a Pregunta model.
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

					$pregunta= (object)Yii::$app->request->post('Pregunta');
            		$model =  $this->findModel($pregunta->idpregunta);
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
				$model = new Pregunta();
		 		//Datos de la Tabla Pregunta
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/pregunta/kendo_pregunta_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/pregunta/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
			if(!$post){
			if(isset($_GET['id']))
			{
				$condition =array(
					'idpregunta'=>$_GET['id']
						);
            	$model = Pregunta::findOne($condition);

				if(is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl().'gestion/pregunta');
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Pregunta
		 		AppAssetPlugins::setPlugins_CKeditor($this->view);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/pregunta/kendo_pregunta_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
									'message'=>'',
                					'model' => $model,
									'action' => $action,
									'textaction'=>'Actualizar',
									'idpregunta'=>'Pregunta[idpregunta]',
            		 		]);
			}
			else
				return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta');


            }
				//Request por post
			$idpregunta=Yii::$app->request->post('Pregunta')['idpregunta'];
					$condition =array(
						'idpregunta'=>$idpregunta
						);
			$model=Pregunta::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$model->save();
                       return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta');
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la actualizacion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Actualizar',
							'idpregunta'=>'Pregunta[idpregunta]',
            		 ]);
                }
            }
	 	}
		//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'gestion/pregunta');
	}
/**
     * Deletes an existing Pregunta model.
     * If deletion is successful, return a message in json format with ok response.
     * @return josn format message
     */
    public function actionDelete()
    {
        if($_POST['array']){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $array= json_decode($_POST['array']);
                try {
            foreach ($array as $pregunta) {
                    $id=array(
                        'idpregunta'=>$pregunta->idpregunta
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El pregunta  fue eliminado con exito');
                }            }
			catch (\Exception $e) {
                    $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
                }
            return $jsonResult;
        }
    }
/**
	 * Find a single Pregunta model.
	 * @return mixed
	 */
public function actionFindbyukjson()
	{
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Pregunta'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Pregunta'];
			$pregunta=Pregunta::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($pregunta!=null &&  $_GET['idpregunta']!=$pregunta['idpregunta'])
				$jsonResult = array('valid' => false);
			return $jsonResult;
		}
	}
/**
     * Finds the Pregunta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pregunta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pregunta::findOne($id)) !== null) {
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
		 				->from('pregunta')
		 				->orderBy(array('pregunta.idpregunta'=>SORT_ASC))
			 	->select('pregunta.*,pregunta.pregunta as text ,pregunta.idpregunta as id ')
			 	->where('pregunta.pregunta LIKE '."'%".$like."%'")
			 	->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
		 	$rows = $query
		 		->from('pregunta')
		 		->orderBy(array('pregunta.idpregunta'=>SORT_ASC))
			 	->select('pregunta.*')
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
     * Load  from Excel a list of the Pregunta table based on its primary key value.
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
					$idpregunta = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idpregunta)) {
						$idpregunta = $worksheet->getCell('A' . $row)->getValue();
						$pregunta = $worksheet->getCell('B' . $row)->getValue();
						$pregunta = new Pregunta();
						$pregunta->idpregunta  =  $idpregunta;
						$pregunta->pregunta  =  $pregunta;
						$pregunta->save();
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
     * Create a Excel file  from a list of the Pregunta 
     * @return boolean the list is created
     */
    public  function actionExcel()
    {
			include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
        	include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

			$preguntalist=json_decode($_POST['pregunta_export']);
			$objPHPExcel = new \PHPExcel();
        	$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
			        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
				->setLastModifiedBy($name_user)
				->setTitle('Listado de Pregunta')
				->setSubject('Listado de Pregunta')
				->setDescription('Documento con el listado de Preguntas segun '.Yii::$app->id);
        		$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idpregunta');
				$objPHPExcel->getActiveSheet()->setCellValue('B1', 'pregunta');
				$i=2;
				foreach($preguntalist as  $pregunta) 
					{	
						$pregunta=(object)$pregunta;
						$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $pregunta->idpregunta);
						$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $pregunta->pregunta);
						$i++;
					}

	 			$exceklib= new \PHPExcel_IOFactory();
        		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
				header("Content-Disposition: attachment; filename=\"Listado_pregunta.xls\"");
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
            $rows = Pregunta::find()->all();
            return $rows;
        }
    }
}
 ?>
