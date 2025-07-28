<?php
/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\seguridad\controllers;

use backend\modules\gestion\models\Experticia;
use Yii;
use backend\themes\make\AppAssetMake;
use backend\themes\make\assets\php\AppAssetPlugins;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\View;
use yii\base\Exception;

use backend\modules\seguridad\models\Usuario;
use backend\modules\seguridad\models\UsuarioSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * usuarioimplenta las acciones del modelo usuario .
 *
 */
class UsuarioController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list_json', 'list', 'update', 'index', 'view', 'create', 'delete', 'load_excel', 'excel', 'findbyukjson'],
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
        AppAssetPlugins::getPlugins_ComponentsCss($this->view);
        AppAssetPlugins::getPlugins_Select2($this->view);
        array_push($this->view->js, Yii::$app->homeUrl . '/js/validation/validation.js');

    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->getIsAjax()) {
            $this->actionAssetPluginLoad();
            //Datos de la Tabla Usuario
            AppAssetPlugins::getPlugins_DateRange($this->view);
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/rol/kendo_rol.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/rol/kendo_rol_datasource.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/experticia/kendo_experticia.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_components.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_actions_ajax.js');
            array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_init.js');
            return $this->getView()->render('@backend/modules/seguridad/views/usuario/index', array('index' => false));
        } else {
            $this->actionAssetPlugin();
            //Datos de la Tabla Usuario
            AppAssetPlugins::setPlugins_DateRange($this->view);
            $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/seguridad/rol/kendo_rol.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/seguridad/rol/kendo_rol_datasource.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_components.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_actions_ajax.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_init.js',
                ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

            return $this->render('index', [
                'index' => true
            ]);
        }
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
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
                $usuario = array('Usuario' => Json::decode(Yii::$app->request->post('Usuario')));
                $like='No Evaluado';
                $experticia=Experticia::find()->where('experticia.grado_experiencia LIKE '."'%".$like."%'")->one();
                $model = new Usuario();
                if ($model->load($usuario)) {
                    try {
                        $model->created_at = date('Y-m-d');
                        $model->updated_at = date('Y-m-d');
                        $model->avatar = 'user.jpg';
                        $model->id_experticia=$experticia->idexperticia;
                        $model->contrasena=md5($model->contrasena);
                        $result = $model->save();
                        if (count($_FILES) > 0) {
                            $foto = (object)$_FILES['avatar'];
                            $rutaimages = Yii::$app->params['usuario_image_path'];
                            $pos = strpos($foto->name, '.');
                            $ext = str_split($foto->name, $pos + 1)[1];
                            $name_foto = 'usuario_' . $model->primaryKey;
                            $imageoriginal = $rutaimages . $name_foto . '.' . $ext;
                            move_uploaded_file($foto->tmp_name, $imageoriginal); //Movemos el archivo temporal a la ruta especificada
                            $model->avatar = $name_foto . '.' . $ext;
                        }
                        $result = $model->save();

                        if ($result)
                            $jsonResult = array('success' => true, 'message' => '');
                        else
                            $jsonResult = array('success' => false, 'message' => 'Ocurrió un error en la inserción verifique bien los datos');
                    } catch (Exception $e) {
                        $jsonResult = array('success' => false, 'message' => '');
                    }
                    return $jsonResult;
                }
            } else {
                $this->actionAssetPluginLoad();
                $action = 'create';
                $model = new Usuario();
                //Datos de la Tabla Usuario
                AppAssetPlugins::getPlugins_DateRange($this->view);
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/rol/kendo_rol.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/rol/kendo_rol_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/experticia/kendo_experticia.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_components.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_actions_ajax.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_init.js');
                return $this->getView()->render('@backend/modules/seguridad/views/usuario/form', array('action' => $action, 'model' => $model, 'checked' => '', 'required' => 'required'));
            }
        } else {
            $model = new Usuario();
            if ($post) {
                if ($model->load(Yii::$app->request->post())) {
                    try {

                        $model->created_at = date('Y-m-d', strtotime($model->created_at));
                        $model->updated_at = date('Y-m-d', strtotime($model->updated_at));
                        $result = $model->save();
                        if ($result) {
                            if (strpos($_POST['btnsubmit'], 'new') == -1)
                                return $this->redirect(Yii::$app->homeUrl . 'seguridad/usuario');
                            else
                                return $this->redirect(Yii::$app->homeUrl . 'seguridad/usuario/create');
                        } else {
                            return $this->render('form', [
                                'message' => 'Ocurrio un error en la insercion del elemento',
                                'model' => $model,
                                'action' => $action,
                                'textaction' => 'Insertar',
                                'idusuario' => '',
                            ]);
                        }
                    } catch (\Exception $e) {
                        return $this->render('form', [
                            'message' => 'Ocurrio un error en la insercion del elemento',
                            'model' => $model,
                            'action' => $action,
                            'textaction' => 'Insertar',
                            'idusuario' => '',
                        ]);
                    }
                }
            } else {
                $this->actionAssetPlugin();
                //Datos de la Tabla Usuario
                AppAssetPlugins::setPlugins_DateRange($this->view);
                $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/seguridad/rol/kendo_rol.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/seguridad/rol/kendo_rol_datasource.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_components.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_actions.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_init.js',
                    ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

                return $this->render('form', [
                    'message' => '',
                    'model' => $model,
                    'action' => $action,
                    'textaction' => 'Insertar',
                    'idusuario' => '',
                ]);
            }
        }
    }

    /**
     * Update a Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdate()
    {
        $post = count(Yii::$app->request->post()) > 0;

        $action = 'update';
        if (Yii::$app->request->getIsAjax()) {
            if (count(Yii::$app->request->post()) > 0) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $usuario = array('Usuario' => Json::decode(Yii::$app->request->post('Usuario')));
                $model = Usuario::findOne($usuario['Usuario']['idusuario']);
                $pass = $model->contrasena;
                if ($model->load($usuario)) {
                    try {
                        $model->updated_at = date('Y-m-d');
                        if ($usuario['Usuario']['contrasena'] != '') {
                            $model->contrasena = md5($pass);
                        }
                        else
                            $model->contrasena=$pass;
                        $result = $model->save();
                        if (count($_FILES) > 0) {
                            $foto = (object)$_FILES['avatar'];
                            $rutaimages = Yii::$app->params['usuario_image_path'];
                            $pos = strpos($foto->name, '.');
                            $ext = str_split($foto->name, $pos + 1)[1];
                            $name_foto = 'usuario_' . $model->primaryKey;
                            $imageoriginal = $rutaimages . $name_foto . '.' . $ext;
                            move_uploaded_file($foto->tmp_name, $imageoriginal); //Movemos el archivo temporal a la ruta especificada
                            $model->avatar = $name_foto . '.' . $ext;
                        }
                        $result = $model->save();
                        $jsonResult = array('success' => true, 'message' => '');
                    } catch (Exception $e) {
                        $jsonResult = array('success' => false, 'message' => '');
                    }
                    return $jsonResult;
                }
            } else {
                $this->actionAssetPluginLoad();
                $model = new Usuario();
                //Datos de la Tabla Usuario
                AppAssetPlugins::getPlugins_DateRange($this->view);
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/rol/kendo_rol.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/rol/kendo_rol_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/experticia/kendo_experticia.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_components.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_actions_ajax.js');
                array_push($this->view->js, Yii::$app->homeUrl . '/js/onto_360_js/seguridad/usuario/kendo_usuario_init.js');
                return $this->getView()->render('@backend/modules/seguridad/views/usuario/form', array('action' => $action, 'model' => $model, 'checked' => '', 'required' => 'required'));
            }
        } else {
            if (!$post) {
                if (isset($_GET['id'])) {
                    $condition = array(
                        'idusuario' => $_GET['id']
                    );
                    $model = Usuario::findOne($condition);

                    if (is_null($model))
                        return $this->redirect(Yii::$app->getHomeUrl() . 'seguridad/usuario');
                    $this->actionAssetPlugin();
                    //Datos de la Tabla Usuario
                    AppAssetPlugins::setPlugins_DateRange($this->view);
                    $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/seguridad/rol/kendo_rol.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/seguridad/rol/kendo_rol_datasource.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/nomencladores/categoriacientifica/kendo_categoriacientifica_datasource.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/gestion/experticia/kendo_experticia_datasource.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_datasource.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_components.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_actions.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);
                    $this->view->registerJsFile('@web/js/onto_360_js/seguridad/usuario/kendo_usuario_init.js',
                        ['depends' => [AppAssetMake::className()], 'position' => View::POS_END]);

                    return $this->render('form', [
                        'message' => '',
                        'model' => $model,
                        'action' => $action,
                        'textaction' => 'Actualizar',
                        'idusuario' => 'Usuario[idusuario]',
                    ]);
                } else
                    return $this->redirect(Yii::$app->homeUrl . 'seguridad/usuario');


            }
            //Request por post
            $idusuario = Yii::$app->request->post('Usuario')['idusuario'];
            $condition = array(
                'idusuario' => $idusuario
            );
            $model = Usuario::findOne($condition);
            if ($model->load(Yii::$app->request->post())) {
                try {

                    $model->created_at = date('Y-m-d', strtotime($model->created_at));
                    $model->updated_at = date('Y-m-d', strtotime($model->updated_at));
                    $model->update();
                    return $this->redirect(Yii::$app->homeUrl . 'seguridad/usuario');
                } catch (\Exception $e) {
                    return $this->render('form', [
                        'message' => 'Ocurrió un error en la actualización del elemento',
                        'model' => $model,
                        'action' => $action,
                        'textaction' => 'Actualizar',
                        'idusuario' => 'Usuario[idusuario]',
                    ]);
                }
            }
        }
        //Si no hay datos redirecciona al index
        return $this->redirect(Yii::$app->homeUrl . 'seguridad/usuario');
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, return a message in json format with ok response.
     * @return josn format message
     */
    public function actionDelete()
    {
        if ($_POST['array']) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $array = json_decode($_POST['array']);
            try {
                foreach ($array as $usuario) {
                    $id = array(
                        'idusuario' => $usuario->idusuario
                    );
                    $this->findModel($id)->delete();
                    $jsonResult = array('success' => true, 'message' => 'El usuario  fue eliminado con exito');
                }
            } catch (\Exception $e) {
                $jsonResult = array('success' => false, 'message' => 'Algunos elementos no se eliminarion,existen elementos asociados, no es posible su eliminacion');
            }
            return $jsonResult;
        }
    }

    /**
     * Find a single Usuario model.
     * @return mixed
     */
    public function actionFindbyukjson()
    {
        if (Yii::$app->request->getIsAjax() && isset($_GET['Usuario'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $condition = $_GET['Usuario'];
            $usuario = Usuario::findByUK($condition);
            $jsonResult = array('valid' => true);
            if ($usuario != null && $_GET['idusuario'] != $usuario['idusuario'])
                $jsonResult = array('valid' => false);
            return $jsonResult;
        }
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La pagina solicitada no existe');
        }
    }


    /**
     * Returns a list of models in JSON format.
     * This method is used by the js in the view.
     * @return a list of models in json format
     */
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
                    ->from('usuario')
                    ->orderBy(array('usuario.idusuario' => SORT_ASC))
                    ->join('inner join', 'rol', 'usuario.id_rol=rol.idrol')
                    ->join('inner join', 'categoriacientifica', 'usuario.id_catcientifica=categoriacientifica.idcatcientifica')
                    ->join('inner join', 'experticia', 'usuario.id_experticia=experticia.idexperticia')
                    ->select('usuario.*,rol.rol ,categoriacientifica.categcient ,experticia.grado_experiencia ,usuario.usuario as text ,usuario.idusuario as id ')
                    ->where('usuario.usuario LIKE ' . "'%" . $like . "%'")
                    ->all();
                $result['data'] = $rows;
                $rows = $result;
            } else
                $rows = $query
                    ->from('usuario')
                    ->orderBy(array('usuario.idusuario' => SORT_ASC))
                    ->join('inner join', 'rol', 'usuario.id_rol=rol.idrol')
                    ->join('inner join', 'categoriacientifica', 'usuario.id_catcientifica=categoriacientifica.idcatcientifica')
                    ->join('left outer join', 'experticia', 'usuario.id_experticia=experticia.idexperticia')
                    ->select('usuario.*,rol.rol ,categoriacientifica.categcient ,experticia.grado_experiencia ')
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
     * Load  from Excel a list of the Usuario table based on its primary key value.
     * @return boolean the list is loaded
     */
    public function actionLoad_excel()
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
                    $usuario = $worksheet->getCell('A' . $row)->getFormattedValue();
                    if (!empty($usuario)) {
                        $usuario = $worksheet->getCell('A' . $row)->getValue();
                        $nombre = $worksheet->getCell('B' . $row)->getValue();
                        $contrasena = $worksheet->getCell('C' . $row)->getValue();
                        $idusuario = $worksheet->getCell('D' . $row)->getValue();
                        $id_rol = $worksheet->getCell('E' . $row)->getValue();
                        $auth_key = $worksheet->getCell('F' . $row)->getValue();
                        $created_at = $worksheet->getCell('G' . $row)->getValue();
                        $updated_at = $worksheet->getCell('H' . $row)->getValue();
                        $avatar = $worksheet->getCell('I' . $row)->getValue();
                        $apellido1 = $worksheet->getCell('J' . $row)->getValue();
                        $apellido2 = $worksheet->getCell('K' . $row)->getValue();
                        $activo = $worksheet->getCell('L' . $row)->getValue();
                        $experto = $worksheet->getCell('M' . $row)->getValue();
                        $id_catcientifica = $worksheet->getCell('N' . $row)->getValue();
                        $id_experticia = $worksheet->getCell('�' . $row)->getValue();
                        $correo = $worksheet->getCell('O' . $row)->getValue();
                        $usuario = new Usuario();
                        $usuario->usuario = $usuario;
                        $usuario->nombre = $nombre;
                        $usuario->contrasena = $contrasena;
                        $usuario->idusuario = $idusuario;
                        $usuario->id_rol = $id_rol;
                        $usuario->auth_key = $auth_key;
                        $usuario->created_at = $created_at;
                        $usuario->updated_at = $updated_at;
                        $usuario->avatar = $avatar;
                        $usuario->apellido1 = $apellido1;
                        $usuario->apellido2 = $apellido2;
                        $usuario->activo = $activo;
                        $usuario->experto = $experto;
                        $usuario->id_catcientifica = $id_catcientifica;
                        $usuario->id_experticia = $id_experticia;
                        $usuario->correo = $correo;
                        $usuario->save();
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
     * Create a Excel file  from a list of the Usuario
     * @return boolean the list is created
     */
    public function actionExcel()
    {
        include(Yii::$app->basePath . '/vendor/php_excel/PHPExcel_IOFactory.php');
        include(Yii::$app->basePath . '/vendor/php_excel/PHPExcel.php');

        $usuariolist = json_decode($_POST['usuario_export']);
        $objPHPExcel = new \PHPExcel();
        $name_user = Yii::$app->getUser()->identity->oldAttributes['username'];
        $objPHPExcel->getProperties()->setCreator(Yii::$app->id)
            ->setLastModifiedBy($name_user)
            ->setTitle('Listado de Usuario')
            ->setSubject('Listado de Usuario')
            ->setDescription('Documento con el listado de Usuarios segun ' . Yii::$app->id);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'usuario');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'nombre');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'contrasena');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'idusuario');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'id_rol');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'auth_key');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'created_at');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'updated_at');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'avatar');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'apellido1');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'apellido2');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'activo');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'experto');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'id_catcientifica');
        $objPHPExcel->getActiveSheet()->setCellValue('�1', 'id_experticia');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'correo');
        $i = 2;
        foreach ($usuariolist as $usuario) {
            $usuario = (object)$usuario;
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $usuario->usuario);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $usuario->nombre);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $usuario->contrasena);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $usuario->idusuario);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $usuario->id_rol);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $usuario->auth_key);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $usuario->created_at);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $usuario->updated_at);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $usuario->avatar);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $usuario->apellido1);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $usuario->apellido2);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $usuario->activo);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $usuario->experto);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $usuario->id_catcientifica);
            $objPHPExcel->getActiveSheet()->setCellValue('�' . $i, $usuario->id_experticia);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $usuario->correo);
            $i++;
        }

        $exceklib = new \PHPExcel_IOFactory();
        $objWriter = $exceklib->createWriter($objPHPExcel, 'Excel2007');
        header("Content-Disposition: attachment; filename=\"Listado_usuario.xls\"");
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
        if (count($_POST) > 0) {
            $rows = Usuario::find()->all();
            return $rows;
        }
    }
}

?>
