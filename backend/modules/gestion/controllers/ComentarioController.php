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

use backend\modules\gestion\models\Comentario;
use backend\modules\gestion\models\ComentarioSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/** 
 * comentarioimplenta las acciones del modelo comentario .
 *
 */
class ComentarioController extends Controller
{

    public function behaviors()
    {
        return [
			 'access' => [
						'class' => AccessControl::className(),
						'rules' => [
								[
										'actions' => ['list_json','list','update','index','view','create','delete','deletebyonto','load_excel','excel','findbyukjson','list_comentbyonto'],
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
     * Lists all Comentario models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->request->getIsAjax()) 
			{
				$this->actionAssetPluginLoad();
		 		//Datos de la Tabla Comentario
		 		AppAssetPlugins::getPlugins_DateRange($this->view);
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/seguridad/usuario/kendo_usuario.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_init.js');
		 		return $this->getView()->render('@backend/modules/gestion/views/comentario/index',array('index'=>false));
			}
			else
			 {
				$this->actionAssetPlugin();
		 //Datos de la Tabla Comentario
		 		AppAssetPlugins::setPlugins_DateRange($this->view);
		 		AppAssetPlugins::setPlugins_CKeditor($this->view);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_actions_ajax.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

        		return $this->render('index', [
					'index'=>true
        		]);
    		 }
	}
/**
     * Displays a single Comentario model.
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
     * Creates a new Comentario model.
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
            $model = new Comentario();
            if ($model->load(Yii::$app->request->post())) {
                try {
                    $model->fecha= date('Y-m-d',strtotime($model->fecha));
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
				$model = new Comentario();
		 		//Datos de la Tabla Comentario
		 		AppAssetPlugins::getPlugins_DateRange($this->view);
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/seguridad/usuario/kendo_usuario.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/comentario/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
            $model = new Comentario();
            if ($post){
            if ($model->load(Yii::$app->request->post())) {
                try {

                    $model->fecha= date('Y-m-d',strtotime($model->fecha));
                    	$result=$model->save();
                    if($result){
						  if (strpos($_POST['btnsubmit'], 'new') == -1)
                        return $this->redirect(Yii::$app->homeUrl.'gestion/comentario');
						    else
                        return $this->redirect(Yii::$app->homeUrl.'gestion/comentario/create');
						}
                    else
						{
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idcomentario'=>'',
            		 ]);
					}
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la insercion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idcomentario'=>'',
            		 ]);
                }
            }
		}else{
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Comentario
		 		AppAssetPlugins::setPlugins_DateRange($this->view);
		 		AppAssetPlugins::setPlugins_CKeditor($this->view);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

					return $this->render('form', [
							'message'=>'',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Insertar',
							'idcomentario'=>'',
            		 ]);
                }
	 	}
	}
/**
     * Update a Comentario model.
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

					$comentario= (object)Yii::$app->request->post('Comentario');
            		$model =  $this->findModel($comentario->idcomentario);
            		if ($model->load(Yii::$app->request->post())) {
                		try {
                    		$model->fecha= date('Y-m-d',strtotime($model->fecha));
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
				$model = new Comentario();
		 		//Datos de la Tabla Comentario
		 		AppAssetPlugins::getPlugins_DateRange($this->view);
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/seguridad/usuario/kendo_usuario.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_datasource.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_components.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_actions_ajax.js');
		 		array_push($this->view->js,Yii::$app->homeUrl.'/js/onto_360_js/gestion/comentario/kendo_comentario_init.js');
				return $this->getView()->render('@backend/modules/gestion/views/comentario/form',array('action'=>$action,'model'=>$model,'checked'=>'','required'=>'required'));
			}
        }
	 else
	 	{
			if(!$post){
			if(isset($_GET['id']))
			{
				$condition =array(
					'idcomentario'=>$_GET['id']
						);
            	$model = Comentario::findOne($condition);

				if(is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl().'gestion/comentario');
			 $this->actionAssetPlugin();
		 //Datos de la Tabla Comentario
		 		AppAssetPlugins::setPlugins_DateRange($this->view);
		 		AppAssetPlugins::setPlugins_CKeditor($this->view);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/ontologia/kendo_ontologia_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_datasource.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_components.js',
            		['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_actions.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);
		 		$this->view->registerJsFile('@web/js/onto_360_js/gestion/comentario/kendo_comentario_init.js',
					['depends' => [AppAssetMake::className()],'position'=>View::POS_END]);

				return $this->render('form', [
									'message'=>'',
                					'model' => $model,
									'action' => $action,
									'textaction'=>'Actualizar',
									'idcomentario'=>'Comentario[idcomentario]',
            		 		]);
			}
			else
				return $this->redirect(Yii::$app->homeUrl.'gestion/comentario');


            }
				//Request por post
			$idcomentario=Yii::$app->request->post('Comentario')['idcomentario'];
					$condition =array(
						'idcomentario'=>$idcomentario
						);
			$model=Comentario::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    $model->fecha= date('Y-m-d',strtotime($model->fecha));
                    	$model->update();
                       return $this->redirect(Yii::$app->homeUrl.'gestion/comentario');
                } catch (\Exception $e) {
							return $this->render('form', [
							'message'=>'Ocurrio un error en la actualizacion del elemento',
                			'model' => $model,
							'action' => $action,
							'textaction'=>'Actualizar',
							'idcomentario'=>'Comentario[idcomentario]',
            		 ]);
                }
            }
	 	}
		//Si no hay datos redirecciona al index
		return $this->redirect(Yii::$app->homeUrl.'gestion/comentario');
	}
/**
     * Deletes an existing Comentario model.
     * If deletion is successful, return a message in json format with ok response.
     * @return josn format message
     */
    public function actionDelete()
    {
        if($_POST['array']){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $array= json_decode($_POST['array']);
                try {
            foreach ($array as $comentario) {
                    $id=array(
                        'idcomentario'=>$comentario->idcomentario
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El comentario  fue eliminado con exito');
                }            }
			catch (\Exception $e) {
                    $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
                }
            return $jsonResult;
        }
    }

	public function actionDeletebyonto()
	{
		if ($_POST['array']) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$jsonResult = [];
			$array = json_decode($_POST['array']);
			try {
				foreach ($array as $ontologia) {
					Comentario::deleteAll("id_ontologia=" . $ontologia->idontologia);
					$jsonResult = array('success' => true, 'message' => 'El comentario  fue eliminado con exito');
				}
			} catch (\Exception $e) {
				$jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
			}
			return $jsonResult;
		}
	}

	/**
	 * Find a single Comentario model.
	 * @return mixed
	 */
public function actionFindbyukjson()
	{
		if (Yii::$app->request->getIsAjax() && isset( $_GET['Comentario'])) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$condition=$_GET['Comentario'];
			$comentario=Comentario::findByUK($condition);
			$jsonResult = array('valid' => true);
			if($comentario!=null &&  $_GET['idcomentario']!=$comentario['idcomentario'])
				$jsonResult = array('valid' => false);
			return $jsonResult;
		}
	}
/**
     * Finds the Comentario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comentario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comentario::findOne($id)) !== null) {
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
		 				->from('comentario')
		 				->orderBy(array('comentario.idcomentario'=>SORT_ASC))
			 	->join('inner join','ontologia','comentario.id_ontologia=ontologia.idontologia')
			 	->join('inner join','usuario','comentario.id_usuario=usuario.idusuario')
			 	->select('comentario.*,ontologia.nombre ,usuario.usuario ,comentario.comentario as text ,comentario.idcomentario as id ')
			 	->where('comentario.comentario LIKE '."'%".$like."%'")
			 	->all();
				$result['data']=$rows;
				$rows=$result;
			}
			else
		 	$rows = $query
		 		->from('comentario')
			 	->join('inner join','ontologia','comentario.id_ontologia=ontologia.idontologia')
			 	->join('inner join','usuario','comentario.id_usuario=usuario.idusuario')
			 	->select('ontologia.*')->groupBy('ontologia.idontologia')
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
     * Load  from Excel a list of the Comentario table based on its primary key value.
     * @return boolean the list is loaded
     */

	public function actionList_comentbyonto($id)
	{
		if (Yii::$app->request->getIsAjax()) {
			$query = new Query();
			$rows = '';
			$rows = $query
				->from('comentario')
				->orderBy(array('comentario.idcomentario' => SORT_ASC))
				->join('inner join', 'ontologia', 'comentario.id_ontologia=ontologia.idontologia')
				->join('inner join', 'usuario', 'comentario.id_usuario=usuario.idusuario')
				->select('comentario.* ,ontologia.*,usuario.* ')
				->where('ontologia.idontologia=' . $id)
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
					$idcomentario = $worksheet->getCell('A' . $row)->getFormattedValue();
					if (!empty($idcomentario)) {
						$idcomentario = $worksheet->getCell('A' . $row)->getValue();
						$comentario = $worksheet->getCell('B' . $row)->getValue();
						$id_ontologia = $worksheet->getCell('C' . $row)->getValue();
						$fecha = $worksheet->getCell('D' . $row)->getValue();
						$id_usuario = $worksheet->getCell('E' . $row)->getValue();
						$comentario = new Comentario();
						$comentario->idcomentario  =  $idcomentario;
						$comentario->comentario  =  $comentario;
						$comentario->id_ontologia  =  $id_ontologia;
						$comentario->fecha  =  $fecha;
						$comentario->id_usuario  =  $id_usuario;
						$comentario->save();
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
     * Create a Excel file  from a list of the Comentario 
     * @return boolean the list is created
     */
    public  function actionExcel()
    {
			include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel_IOFactory.php');
        	include(Yii::$app->basePath.'/vendor/php_excel/PHPExcel.php');

			$comentariolist=json_decode($_POST['comentario_export']);
			$objPHPExcel = new \PHPExcel();
        	$name_user=Yii::$app->getUser()->identity->oldAttributes['username'];
			        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
				->setLastModifiedBy($name_user)
				->setTitle('Listado de Comentario')
				->setSubject('Listado de Comentario')
				->setDescription('Documento con el listado de Comentarios segun '.Yii::$app->id);
        		$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setCellValue('A1', 'idcomentario');
				$objPHPExcel->getActiveSheet()->setCellValue('B1', 'comentario');
				$objPHPExcel->getActiveSheet()->setCellValue('C1', 'id_ontologia');
				$objPHPExcel->getActiveSheet()->setCellValue('D1', 'fecha');
				$objPHPExcel->getActiveSheet()->setCellValue('E1', 'id_usuario');
				$i=2;
				foreach($comentariolist as  $comentario) 
					{	
						$comentario=(object)$comentario;
						$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $comentario->idcomentario);
						$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $comentario->comentario);
						$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $comentario->id_ontologia);
						$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $comentario->fecha);
						$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $comentario->id_usuario);
						$i++;
					}

	 			$exceklib= new \PHPExcel_IOFactory();
        		$objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
				header("Content-Disposition: attachment; filename=\"Listado_comentario.xls\"");
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
            $rows = Comentario::find()->all();
            return $rows;
        }
    }
}
 ?>
