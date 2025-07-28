<?php
namespace backend\controllers;

use backend\modules\seguridad\models\Usuario;
use backend\themes\make\assets\php\AppAssetPlugins;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index', 'cambio_contrasena'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout='login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $error='Usuario o Contraseña Incorrectos';
            if(count(Yii::$app->request->post())==0 )
                $error='';
            return $this->render('login', [
                'model' => $model,
                'error'=>$error
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionCambio_contrasena()
    {
        $mensaje=null;
        if (Yii::$app->request->post()) {
            if(count(Yii::$app->request->post())>0){
                $modelPass= new Usuario();
                $modelPass->load(Yii::$app->request->post());
                $user = Usuario::find()->where(['idusuario' => Yii::$app->user->identity->idusuario])->one();
                if($user->correo== $modelPass->correo && $user->contrasena==$modelPass->contrasena && $modelPass->contrasena!=$_POST['contrasena_nueva'] && $_POST['contrasena_nueva']== $_POST['contrasena_verific']){
                    $user->contrasena=$_POST['contrasena_nueva'];
                    $mensaje='Contraseña cambiada satisfactoriamente';
                    $user->save();
                }
                else{
                    $mensaje='La contraseña no ha podido ser cambiada, introduzca nuevamente los datos';

                }
            }


        }

        return $this->render('contrasena', [
            'mensaje'=>$mensaje,
        ]);

    }




}
