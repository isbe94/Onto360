<?php
namespace frontend\controllers;

use backend\modules\gestion\models\Clasificacion_ontologia;
use backend\modules\gestion\models\Comentario;
use backend\modules\gestion\models\Lenguaje;
use backend\modules\gestion\models\pregunta_respuestas;
use backend\modules\gestion\models\Experticia;
use backend\modules\gestion\models\Ontologia;
use backend\modules\gestion\models\Tecnologia;
use backend\modules\nomencladores\models\Categoriacientifica;
use backend\modules\nomencladores\models\Clasificacion;
use backend\modules\seguridad\models\Usuario;
use frontend\themes\pages\AppAssetPages;

use frontend\themes\pages\assets\php\AppAssetPlugins;
use Yii;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\View;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup', 'registrarse'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'crear_onto_perfil','actualizar_onto_perfil','form_actualizar_onto_perfil','listar_mi_perfil_onto','evaluar_experticia','comentar','comentar_foro_onto','foro_onto','experticia'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "main";
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $error = 'Usuario o Contraseña Incorrectos';
            if (count(Yii::$app->request->post()) == 0)
                $error = '';
            return $this->render('login', [
                'model' => $model,
                'error' => $error
            ]);
        }
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionPerfil()
    {

        $perfil = Yii::$app->getUser()->identity;
        $catcient = Categoriacientifica::find()->where(['categoriacientifica.idcatcientifica' => $perfil->id_catcientifica])->one();
        $gradoexp = Experticia::find()->where(['experticia.idexperticia' => $perfil->id_experticia])->one();

        return $this->render('perfil', [
            'perfil' => $perfil,
            'catcient' => $catcient,
            'gradoexp' => $gradoexp
        ]);
    }

    public function actionRegistrarse()
    {
        $model = new Usuario();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->avatar = "user.jpg";
            $model->id_rol = 2;
            $model->activo = 1;
            $model->contrasena=md5($model->contrasena);
            $result = $model->save();


            if (count($_FILES) > 0) {
                $foto = (object)$_FILES['Usuario'];
                $rutaimages = Yii::$app->params['usuario_image_path'];
                $pos = strpos($foto->name['avatar'], '.');
                $ext = str_split($foto->name['avatar'], $pos + 1)[1];
                $name_foto = 'usuario_' . $model->primaryKey;
                $imageoriginal = $rutaimages . $name_foto . '.' . $ext;
                move_uploaded_file($foto->tmp_name['avatar'], $imageoriginal); //Movemos el archivo temporal a la ruta especificada
                $model->avatar = $name_foto . '.' . $ext;
            }

            $result = $model->save();
            return $this->redirect(Yii::$app->homeUrl);
        }


        AppAssetPlugins::setPlugins_Fonts($this->view);
        AppAssetPlugins::setPlugins_NotificationsW8($this->view);
        AppAssetPlugins::setPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::setPlugins_Select2($this->view);
        $this->view->registerJsFile('@web/js/validation/validation.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);
        AppAssetPlugins::setPlugins_DateRange($this->view);
        $this->view->registerJsFile('@web/js/site/registrarse.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);

        return $this->render('registrarse', [
            'model' => $model,
        ]);
    }

    public function actionCrear_onto_perfil()
    {
        $mensaje='';
        $action='crear_onto_perfil';
        $model = new Ontologia();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->fichero = "ontologia.owl";
            $model->id_usuario=Yii::$app->getUser()->identity->getId();
            $leng=Lenguaje::find()->where(['lenguaje.lenguaje' => $_POST['Ontologia']['id_lenguaje']])->one();
            $model->id_lenguaje=$leng->idlenguaje;
            $result = $model->save();

            if (isset($_POST['Clasificacion'])){
                foreach ($_POST['Clasificacion']['idclasificacion'] as $clasif_post) {
                    $model1=new Clasificacion_ontologia();
                    $model1->id_ontologia = $model->idontologia;
                    $model1->id_clasificacion = intval($clasif_post);
                    $model1->save();
                }
            }
            if (count($_FILES) > 0) {
                $fichero = (object)$_FILES['Ontologia'];
                $rutaonto = Yii::$app->params['fichero_onto'];
                $pos = strpos($fichero->name['fichero'], '.');
                $ext = str_split($fichero->name['fichero'], $pos + 1)[1];
                $name_onto = 'ontologia_' . $model->primaryKey;
                $fichero_original = $rutaonto . $name_onto . '.' . $ext;
                move_uploaded_file($fichero->tmp_name['fichero'], $fichero_original); //Movemos el archivo temporal a la ruta especificada
                $model->fichero = $name_onto . '.' . $ext;
            }
            $result = $model->save();
            if ($result) {
                return $this->redirect(Yii::$app->homeUrl . 'site/listar_mi_perfil_onto');
            }else{
                $mensaje='Ocurrió un error mientras se insertaba la ontología';
            }
        }

        AppAssetPlugins::setPlugins_Fonts($this->view);
        AppAssetPlugins::setPlugins_NotificationsW8($this->view);
        AppAssetPlugins::setPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::setPlugins_Select2($this->view);
        AppAssetPlugins::setPlugins_DateRange($this->view);

        $this->view->registerJsFile('@web/js/validation/validation.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);
        $this->view->registerJsFile('@web/js/site/crear_onto_perfil.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);

        return $this->render('onto_perfil', [
            'model' => $model,
            'action' => $action,
            'mensaje' => $mensaje,


        ]);
    }

    public function actionActualizar_onto_perfil()
    {
        $action='actualizar_onto_perfil';
        $mensaje='';
        $idontologia = Yii::$app->request->post('Ontologia')['idontologia'];
        $condition = array('idontologia' => $idontologia);
        $model = Ontologia::findOne($condition);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            if ($_FILES['Ontologia']['name']['fichero'] != '') {
                $fichero = (object)$_FILES['Ontologia'];
                $ruta_fichero = Yii::$app->params['fichero_onto'];
                $pos = strpos($fichero->name['fichero'], '.');
                $ext = str_split($fichero->name['fichero'], $pos + 1)[1];
                $name_fichero = 'fichero' . $model->primaryKey;
                $fichero_original = $ruta_fichero . $name_fichero . '.' . $ext;
                move_uploaded_file($fichero->tmp_name['fichero'], $fichero_original); //Movemos el archivo temporal a la ruta especificada
                $model->fichero = $name_fichero . '.' . $ext;

                $leng=Lenguaje::find()->where(['lenguaje.idlenguaje' => $_POST['Ontologia']['id_lenguaje']])->one();
                if ($leng!=null){
                    $model->id_lenguaje=$leng->idlenguaje;
                    $model->save();
                }

            }

            $clasif_onto= new Clasificacion_ontologia();
            $clasif_onto->id_ontologia = $model->primaryKey;

            if (isset($_POST['Clasificacion'])){
                foreach ($_POST['Clasificacion']['idclasificacion'] as $item) {
                    $co = Clasificacion_ontologia::find()->where('id_clasificacion=' . $item)->andWhere('id_ontologia=' . $model->primaryKey)->all();
                    if (count($co) == 0) {
                        $clasif_onto = new Clasificacion_ontologia();
                        $clasif_onto->id_ontologia = $model->primaryKey;
                        $clasif_onto->id_clasificacion = $item;
                        $clasif_onto->save();
                    }
                    $lista_clasificaciones_ontologia=Clasificacion_ontologia::find()->where('id_ontologia='. $model->primaryKey)->all();
                    foreach ($lista_clasificaciones_ontologia as $element_clasif){
                        if (in_array($element_clasif->id_clasificacion,$_POST['Clasificacion']['idclasificacion'])==false){
                            Clasificacion_ontologia::deleteAll("id_clasificacion=" . $element_clasif->id_clasificacion);
                        }
                    }
                }
            }
            $model->save();

            if (!$model->save()){
                $mensaje="Ocurrió un error en la actualización";
            }
            else{
                return $this->redirect(Yii::$app->homeUrl . 'site/listar_mi_perfil_onto');
            }
        }
        AppAssetPlugins::setPlugins_Fonts($this->view);
        AppAssetPlugins::setPlugins_NotificationsW8($this->view);
        AppAssetPlugins::setPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::setPlugins_Select2($this->view);
        AppAssetPlugins::setPlugins_DateRange($this->view);

        $this->view->registerJsFile('@web/js/validation/validation.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);
        $this->view->registerJsFile('@web/js/site/crear_onto_perfil.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);

        return $this->render('onto_perfil', [
            'mensaje' => $mensaje,
            'action' => $action,
            'model' => $model,
        ]);
    }

    public function actionForm_actualizar_onto_perfil()
    {
        $mensaje='';
        $model=null;
        $action='actualizar_onto_perfil';

        if (Yii::$app->request->post()) {
            if (isset($_GET['idontologia'])) {
                $condition = array('idontologia' => $_GET['idontologia']);
                $model = Ontologia::findOne($condition);
            }
            else{
                $mensaje='Ocurrió un error no se puede actualizar este elemento';
            }
        }
        else{
            $mensaje='Ocurrió un error no se puede actualizar este elemento';
        }
        AppAssetPlugins::setPlugins_Fonts($this->view);
        AppAssetPlugins::setPlugins_NotificationsW8($this->view);
        AppAssetPlugins::setPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::setPlugins_Select2($this->view);
        AppAssetPlugins::setPlugins_DateRange($this->view);

        $this->view->registerJsFile('@web/js/validation/validation.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);
        $this->view->registerJsFile('@web/js/site/crear_onto_perfil.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);

        return $this->render('onto_perfil', [
            'action'=>$action,
            'model'=>$model,
            'mensaje'=>$mensaje,

        ]);
    }

    public function actionListar_mi_perfil_onto(){

        $lista_mis_perfiles=array();
        $query = new Query();
        $mis_perfiles = $query
            ->from('clasificacion_ontologia')
            ->orderBy(array('clasificacion_ontologia.id_ontologia'=>SORT_DESC))
            ->join('inner join', 'ontologia', 'clasificacion_ontologia.id_ontologia=ontologia.idontologia')
            ->join('inner join', 'clasificacion', 'clasificacion_ontologia.id_clasificacion=clasificacion.idclasificacion')
            ->select(["ontologia.* , GROUP_CONCAT(clasificacion.clasificacion SEPARATOR ',')  as clasif_array"])->distinct(true)->groupBy('ontologia.idontologia')
            ->all();
        foreach($mis_perfiles as $l){
            $perfil=(object)$l;
            if($perfil->id_usuario == Yii::$app->getUser()->identity->getId()){
                array_push($lista_mis_perfiles, $perfil);
            }
        }

        return $this->render('listar_mi_onto_perfil', [
            'lista_mis_perfiles'=>$lista_mis_perfiles,

        ]);

    }

    public function actionListado_onto()
    {
        $action='';
        $error='';
        $lista_clasif=null;
        $lista_clasif_busc=array();
        $query = new Query();
        $query1=new Query();
        if(!isset($_POST['buscar_onto'])) {
            $lista_clasif = $query
                ->from('clasificacion_ontologia')
                ->orderBy(array('ontologia.idontologia'=>SORT_DESC))
                ->join('inner join', 'ontologia', 'clasificacion_ontologia.id_ontologia=ontologia.idontologia')
                ->join('inner join', 'clasificacion', 'clasificacion_ontologia.id_clasificacion=clasificacion.idclasificacion')
                ->select(["ontologia.* , GROUP_CONCAT(clasificacion.clasificacion SEPARATOR ',')  as clasif_array"])->distinct(true)->groupBy('ontologia.idontologia')
                ->all();
            $lista_onto=$query1
                ->from('ontologia')
                ->select('ontologia.*')
                ->all();
            foreach ($lista_onto as $l_o){
                $o=(object)$l_o;
                $onto=Clasificacion_ontologia::find()->where('id_ontologia=' . $o->idontologia)->one();
                if ($onto==null){
                    array_push($lista_clasif,$l_o);
                }
            }
        }
        else{
            $texto=$_POST['buscar_onto'];
            $lista_clasif_buscar=$query
                ->from('clasificacion_ontologia')
                ->orderBy(array('ontologia.idontologia'=>SORT_DESC))
                ->join('inner join', 'ontologia', 'clasificacion_ontologia.id_ontologia=ontologia.idontologia')
                ->join('inner join', 'clasificacion', 'clasificacion_ontologia.id_clasificacion=clasificacion.idclasificacion')
                ->select(["ontologia.* , GROUP_CONCAT(clasificacion.clasificacion SEPARATOR ',')  as clasif_array"])->distinct(true)->groupBy('ontologia.idontologia')
                ->all();
            $lista_onto=$query1
                ->from('ontologia')
                ->select('ontologia.*')
                ->all();
            foreach ($lista_onto as $l_o){
                $o=(object)$l_o;
                $onto=Clasificacion_ontologia::find()->where('id_ontologia=' . $o->idontologia)->one();
                if ($onto==null){
                    array_push($lista_clasif_buscar,$l_o);
                }
            }
            foreach($lista_clasif_buscar as $l){
                $l_clasif=(object)$l;
                $lenguaje=Lenguaje::find()->where('idlenguaje' == $l_clasif->id_lenguaje)->one();
                $leng=(object)$lenguaje;
                if (array_key_exists('clasif_array',$l)==true){
                    if($l_clasif->nombre == $texto || $l_clasif->dominio == $texto || mb_stristr($l_clasif->clasif_array,$texto) || $leng->lenguaje == $texto){
                        array_push($lista_clasif_busc,$l_clasif);
                    }
                }
            }
            if (count($lista_clasif_busc) == 0){
                $error='No existen coincidencias';
            }
        }


        return $this->render('lista_ontologias', [
            'lista_clasif' => $lista_clasif,
            'error' => $error,
            'lista_clasif_busc' => $lista_clasif_busc,
            'action' => $action,
        ]);

    }

    public function actionListado_tec()
    {

        $tec = Tecnologia::find()->all();
        AppAssetPlugins::setPlugins_dataTables($this->view);

        return $this->render('listado_tecnologia', [

            'tec' => $tec,


        ]);

    }

    public function actionForo()
    {
        //para cargar la ontolgia que deseo comentar seleccionándola desde el foro completo
        if (Yii::$app->request->post()) {
            $ontologia=Ontologia::find()->where("idontologia=" . $_POST['Ontologia']['idontologia'])->orderBy(array("idontologia"=>SORT_DESC))->one();
            $comentarios= Comentario::find()->where("id_ontologia=". $_POST['Ontologia']['idontologia'])->all();
        }
        else{
            //para cargar foro completo
            $ontologia=Ontologia::find()->orderBy(array("idontologia"=>SORT_DESC))->all();

            AppAssetPlugins::setPlugins_Fonts($this->view);
            AppAssetPlugins::setPlugins_NotificationsW8($this->view);
            AppAssetPlugins::setPlugins_bootstrap_Validation($this->view);
            AppAssetPlugins::setPlugins_Select2($this->view);
            AppAssetPlugins::setPlugins_DateRange($this->view);

            $this->view->registerJsFile('@web/js/validation/validation.js',
                ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);
            $this->view->registerJsFile('@web/js/site/comentar_onto.js',
                ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);

            return $this->render('foro', [
                'ontologia'=>$ontologia,


            ]);
        }

        return $this->render('foro', [
            'ontologia'=>$ontologia,
            'comentarios'=>$comentarios,

        ]);

    }

    public function actionForo_onto()
    {
        //para cargar foro de una onto específica seleccionada del listado de ontologías
        if(isset($_GET['idontologia'])) {
            $ontologia = Ontologia::find()->where("idontologia=" . $_GET['idontologia'])->one();
            $comentarios= Comentario::find()->where("id_ontologia=". $_GET['idontologia'])->all();
        }
        AppAssetPlugins::setPlugins_Fonts($this->view);
        AppAssetPlugins::setPlugins_NotificationsW8($this->view);
        AppAssetPlugins::setPlugins_bootstrap_Validation($this->view);
        AppAssetPlugins::setPlugins_Select2($this->view);
        AppAssetPlugins::setPlugins_DateRange($this->view);

        $this->view->registerJsFile('@web/js/validation/validation.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);
        $this->view->registerJsFile('@web/js/site/comentar_onto.js',
            ['depends' => [AppAssetPages::className()], 'position' => View::POS_END]);

        return $this->render('foro_onto', [
            'ontologia'=>$ontologia,
            'comentarios'=>$comentarios,

        ]);

    }

    public function actionComentar(){

        if(Yii::$app->request->post() && $_POST['comentario']!= "" && isset($_POST['Ontologia']['idontologia']) ) {
            $comet = new Comentario();
            $comet->id_ontologia = $_POST['Ontologia']['idontologia'];
            $comet->fecha = date('Y-m-d');
            $comet->id_usuario = Yii::$app->getUser()->identity->idusuario;
            $comet->comentario = $_POST['comentario'];
            $comet->save();
        }else{
            $comet = new Comentario();
            $comet->id_ontologia = $_POST['idontologia'];
            $comet->fecha = date('Y-m-d');
            $comet->id_usuario = Yii::$app->getUser()->identity->idusuario;
            $comet->comentario = $_POST['comentario'];
            $comet->save();
        }

        return $this->redirect(Yii::$app->homeUrl . 'site/foro');


    }

    public function actionComentar_foro_onto(){

        $comentarios= array();
        if(Yii::$app->request->post() && $_POST['comentario']!= "" ) {
            $comet= new Comentario();
            $comet->id_ontologia=$_POST['idontologia'];
            $comet->fecha=date('Y-m-d');
            $comet->id_usuario=Yii::$app->getUser()->identity->idusuario;
            $comet->comentario=$_POST['comentario'];
            $comet->save();
            $ontologia=Ontologia::find()->where("idontologia=" . $comet->id_ontologia)->one();
            $lista_comentarios= Comentario::find()->where("id_ontologia=". $comet->id_ontologia)->all();
            foreach ($lista_comentarios as $l_c){
                array_push($comentarios,$l_c);
            }
            $comet->save();
            return $this->render('foro_onto', [
                'ontologia'=>$ontologia,
                'comentarios'=>$comentarios
            ]);

        }
    }

    public function actionEvaluar_experticia()
    {
        $respuesta=array();
        $cant=null;
        if (Yii::$app->request->post()) {
            $model=$_POST['Respuesta1'];
            array_push($respuesta,$model);
            $model=$_POST['Respuesta2'];
            array_push($respuesta,$model);
            $model=$_POST['Respuesta3'];
            array_push($respuesta,$model);
            $model=$_POST['Respuesta4'];
            array_push($respuesta,$model);
            $model=$_POST['Respuesta5'];
            array_push($respuesta,$model);
            $model=$_POST['Respuesta6'];
            array_push($respuesta,$model);
            $lista_preguntas=$_POST['preguntas'];
            $list_preg=explode(',',$lista_preguntas);

            foreach ($respuesta as $resp){
                foreach ($list_preg as $preg){
                    if ($resp== $preg){
                        $cant++;
                    }
                }
            }

            $usuario=new Usuario();
            $usuario->load(Yii::$app->request->post());
            $usuario->idusuario=Yii::$app->getUser()->identity->getId();
            $condition = array('idusuario' => $usuario->idusuario);
            $user=Usuario::findOne($condition);
            $query=new Query();
            if ($cant <= 2){
                $like='Bajo';
                $eval=$query
                    ->from('experticia')
                    ->select('experticia.idexperticia')
                    ->where('experticia.grado_experiencia LIKE '."'%".$like."%'")
                    ->one();
                $eval_user=(object)$eval;
                $user->id_experticia=$eval_user->idexperticia;
               
            }
            elseif ($cant ==3){
                $like='Medio';
                $eval=$query
                    ->from('experticia')
                    ->select('experticia.idexperticia')
                    ->where('experticia.grado_experiencia LIKE '."'%".$like."%'")
                    ->one();
                $eval_user=(object)$eval;
                $user->id_experticia=$eval_user->idexperticia;
               
            }
            elseif ($cant >=4 && $cant <=5){
                $like='Alto';
                $eval=$query
                    ->from('experticia')
                    ->select('experticia.idexperticia')
                    ->where('experticia.grado_experiencia LIKE '."'%".$like."%'")
                    ->one();
                $eval_user=(object)$eval;
                $user->id_experticia=$eval_user->idexperticia;
               
            }
            else{
                $like='Experto';
                $eval=$query
                    ->from('experticia')
                    ->select('experticia.idexperticia')
                    ->where('experticia.grado_experiencia LIKE '."'%".$like."%'")
                    ->one();
                $eval_user=(object)$eval;
                $user->id_experticia=$eval_user->idexperticia;
            }
        }
        $user->save();

        return $this->redirect(Yii::$app->homeUrl . 'site/experticia');

    }

    public function actionLlenar_pregunta_respuestas()
    {
        $mensaje = null;
        $query = new Query();
        $pregunta_respuestas = $query
            ->from('pregunta_respuestas')
            ->join('inner join', 'pregunta', 'pregunta_respuestas.id_pregunta=pregunta.idpregunta')
            ->join('inner join', 'respuesta', 'pregunta_respuestas.id_respuesta=respuesta.idrespuesta')
            ->select(["pregunta.* , GROUP_CONCAT(respuesta.idrespuesta)  as resp_array"])->distinct(true)->groupBy('pregunta.idpregunta')
            ->all();

        $lista_respuestas=array();
        foreach ($pregunta_respuestas as $c){
            $cuest=(object)$c;
            $respuesta=explode(',',$cuest->resp_array);
            array_push($lista_respuestas,$respuesta);
        }
        return $this->render('evaluacion_experticia', [
            'pregunta_respuestas' => $pregunta_respuestas,
            'lista_respuestas' => $lista_respuestas,
            'mensaje' => $mensaje,
        ]);

    }

    public function actionCambio_contrasena()
    {
        $mensaje = null;
        if (Yii::$app->request->post()) {
            if (count(Yii::$app->request->post()) > 0) {
                $modelPass = new Usuario();
                $modelPass->load(Yii::$app->request->post());
                $user = Usuario::find()->where(['correo' => $modelPass->correo])->one();
                $modelPass->contrasena=md5($modelPass->contrasena);
                if ($user && $user->contrasena == $modelPass->contrasena && $modelPass->contrasena != $_POST['contrasena_nueva'] && $_POST['contrasena_nueva'] == $_POST['contrasena_verific']) {
                    $user->contrasena = md5($_POST['contrasena_nueva']);
                    $user->save();
                    $mensaje = 'Contraseña cambiada satisfactoriamente';
                } else {
                    $mensaje = 'La contraseña no ha podido ser cambiada, introduzca nuevamente los datos';

                }
            }
        }

        return $this->render('contrasena', [
            'mensaje' => $mensaje,
        ]);

    }
    
    public function actionVisualizar()
    {
        $ontologia= Ontologia::findOne($_GET['idontologia']);
        //cargar la ontología
        require_once Yii::$app->params['owl_directory']."OWLLib.php";
        require_once Yii::$app->params['owl_directory']."reader/OWLReader.php";
        require_once Yii::$app->params['owl_directory']."memory/OWLMemoryOntology.php";
        $reader= new \OWLReader();
        $ontology=new \OWLMemoryOntology();
        $filename=Yii::$app->params['fichero_onto']. $ontologia->fichero;
        $reader->readFromFile($filename,$ontology);
        $classlist=$ontology->owl_data['classes'];
        $subclasslist=$ontology->owl_data['subclasses'];
        $proplist=$ontology->owl_data['properties'];
        $instlist=$ontology->owl_data['instances'];
        
        return $this->render('visualizar', [
            'classlist' => $classlist,
            'subclasslist' => $subclasslist,
            'proplist' => $proplist,
            'instlist' => $instlist,
            'ontologia' => $ontologia
        ]);

    }

    public function actionExperticia()
    {
        $query = new Query();
        $usuario_experto = $query
            ->from('usuario')
            ->join('inner join', 'experticia', 'experticia.idexperticia=usuario.id_experticia')
            ->select('usuario.*, experticia.grado_experiencia')
            ->where('usuario.id_experticia!= 5')
            ->all();

        return $this->render('experticia', [
            'usuario_experto' => $usuario_experto
        ]);

    }





}
