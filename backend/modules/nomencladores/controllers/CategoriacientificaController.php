<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/

namespace backend\modules\nomencladores\controllers;

use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\web\View;use yii\base\Exception;

use backend\modules\nomencladores\models\Categoriacientifica;
use backend\modules\nomencladores\models\CategoriacientificaSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/** 
 * categoriacientificaimplenta las acciones del modelo categoriacientifica .
 *
 */
class CategoriacientificaController extends Controller
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
     * Lists all Categoriacientifica models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->request->getIsAjax()) 
			{
				$this->actionAssetPluginLoad();
		 		//Datos de la Tabla Categoriacientifica
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_init.js');
		 		return $this->getView()->render('@backend/modules/nomencladores/views/categoriacientifica/index',array('index'=>false));
			}
			else
			 {
				$this->actionAssetPlugin();
		 //Datos de la Tabla Categoriacientifica
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_actions_ajax.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

        		return $this->render('index', [
					'index'=>true
        		]);
    		 }
	}
/**
     * Displays a single Categoriacientifica model.
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
     * Creates a new Categoriacientifica model.
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
            $model = new Categoriacientifica();
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
				$model = new Categoriacientifica();
		 		//Datos de la Tabla Categoriacientifica
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_init.js');
				return $this->getView()->render('@backend/modules/nomencladores/views/categoriacientifica/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
            $model = new Categoriacientifica();
            if ($post){
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$result=$model->save();
                    if($result){
						  if (strpos($_POST['btnsubmit'], 'new') == -1)
                        return $this->redirect(Yii::$app->homeUrl.'nomencladores/categoriacientifica');
						    else
                        return $this->redirect(Yii::$app->homeUrl.'nomencladores/categoriacientifica/create');
						}
                    else
						{
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idcatcientifica'=>'',
            		 ]);
					}
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idcatcientifica'=>'',
            		 ]);
                }
            }
		}else{
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Categoriacientifica
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
							'message'=>'',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idcatcientifica'=>'',
            		 ]);
                }
	 	}
	}
/**
     * Update a Categoriacientifica model.
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

					$categoriacientifica= (object)Yii::$app->request->post('Categoriacientifica');
            		$model =  $this->findModel($categoriacientifica->idcatcientifica);
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
				$model = new Categoriacientifica();
		 		//Datos de la Tabla Categoriacientifica
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_init.js');
				return $this->getView()->render('@backend/modules/nomencladores/views/categoriacientifica/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
			if(!$post){
			if(isset($_GET['id']))
			{
				$condition =array(
					'idcatcientifica'=>$_GET['id']
						);
            	$model = Categoriacientifica::findOne($condition);

				if(is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl().'nomencladores/categoriacientifica');
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Categoriacientifica
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
									'message'=>'',
                					'model' => $model,
									'action' => $action,
									'textaction'=>'Actualizar',
									'idcatcientifica'=>'Categoriacientifica[idcatcientifica]',
            		 		]);
			}
			else
				return $this->redirect(Yii::$app->homeUrl.'nomencladores/categoriacientifica');


            }
				//Request por post
			$idcatcientifica=Yii::$app->request->post('Categoriacientifica')['idcatcientifica'];
					$condition =array(
						'idcatcientifica'=>$idcatcientifica
						);
			$model=Categoriacientifica::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    	$model->update();
                       return $this->redirect(Yii::$app->homeUrl.'nomencladores/categoriacientifica');
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la actualizacion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Actualizar',
							'idcatcientifica'=>'Categoriacientifica[idcatcientifica]',
            		 ]);
                }
            }
	 	}
		//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'nomencladores/categoriacientifica');
	}
/**
     * Deletes an existing Categoriacientifica model.
     * If deletion is successful, return a message in json format with ok response.
     * @return josn format message
     */
    public function actionDelete()
    {
        if($_POST['array']){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $array= json_decode($_POST['array']);
                try {
            foreach ($array as $categoriacientifica) {
                    $id=array(
                        'idcatcientifica'=>$categoriacientifica->idcatcientifica
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El categoriacientifica  fue eliminado con exito');
                }            }
			catch (\Exception $e) {
                    $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
                }
            return $jsonResult;
        }
    }
/**
	 * Find a single Categoriacientifica model.
	 * @return mixed
	 */
public function actionFindbyukjson()
	{
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Categoriacientifica'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Categoriacientifica'];
			$categoriacientifica=Categoriacientifica::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($categoriacientifica!=null &&  $_GET['idcatcientifica']!=$categoriacientifica['idcatcientifica'])
				$jsonResult = array('valid' => false);
			return $jsonResult;
		}
	}
/**
     * Finds the Categoriacientifica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categoriacientifica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categoriacientifica::findOne($id)) !== null) {
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
		 				->from('categoriacientifica')
		 				->orderBy(array('categoriacientifica.idcatcientifica'=>SORT_ASC))
			 	->select('categoriacientifica.*,categoriacientifica.categcient as text ,categoriacientifica.idcatcientifica as id ')
			 	->where('categoriacientifica.categcient LIKE '."'%".$like."%'")
			 	->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
		 	$rows = $query
		 		->from('categoriacientifica')
		 		->orderBy(array('categoriacientifica.idcatcientifica'=>SORT_ASC))
			 	->select('categoriacientifica.*')
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
     * Load  from Excel a list of the Categoriacientifica table based on its primary key value.
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
					$idcatcientifica = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idcatcientifica)) {
						$idcatcientifica = $worksheet->getCell('A' . $row)->getValue();
						$categcient = $worksheet->getCell('B' . $row)->getValue();
						$categoriacientifica = new Categoriacientifica();
						$categoriacientifica->idcatcientifica  =  $idcatcientifica;
						$categoriacientifica->categcient  =  $categcient;
						$categoriacientifica->save();
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
     * Create a Excel file  from a list of the Categoriacientifica 
     * @return boolean the list is created
     */
    public  function actionExcel()
    {
			include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
        	include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

			$categoriacientificalist=json_decode($_POST['categoriacientifica_export']);
			$objPHPExcel = new \PHPExcel();
        	$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
			        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
				->setLastModifiedBy($name_user)
				->setTitle('Listado de Categoriacientifica')
				->setSubject('Listado de Categoriacientifica')
				->setDescription('Documento con el listado de Categoriacientificas segun '.Yii::$app->id);
        		$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idcatcientifica');
				$objPHPExcel->getActiveSheet()->setCellValue('B1', 'categcient');
				$i=2;
				foreach($categoriacientificalist as  $categoriacientifica) 
					{	
						$categoriacientifica=(object)$categoriacientifica;
						$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $categoriacientifica->idcatcientifica);
						$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $categoriacientifica->categcient);
						$i++;
					}

	 			$exceklib= new \PHPExcel_IOFactory();
        		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
				header("Content-Disposition: attachment; filename=\"Listado_categoriacientifica.xls\"");
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
            $rows = Categoriacientifica::find()->all();
            return $rows;
        }
    }
}
 ?>
