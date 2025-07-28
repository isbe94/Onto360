<?php
/**
 * Created by PhpStorm.
 * User: Isbelita
 * Date: 1/8/2017
 * Time: 18:07
 */

namespace frontend\controllers;


use backend\modules\gestion\models\Ontologia;
use backend\modules\seguridad\models\Usuario;
use yii\db\Query;
use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public $enableCsrfValidation = false;
    public $modelClass="";


    public function actionList_clasif()
    {
        if (\Yii::$app->request->getIsAjax()) {
            $query = new Query();
            $rows = '';
            $like = '';
            if (isset($_GET['q']))
                $like = $_GET['q'];
            $rows = $query
                ->from('clasificacion')
                ->orderBy(array('clasificacion.idclasificacion' => SORT_ASC))
                ->select('clasificacion.*,clasificacion.clasificacion as text ,clasificacion.idclasificacion as id ')
                ->where('clasificacion.clasificacion LIKE ' . "'%" . $like . "%'")
                ->all();

            $result['data'] = $rows;
            $rows = $result;

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


    public function actionList_tec()
    {
        if (\Yii::$app->request->getIsAjax())
        {
            $query= new Query();
            $rows='';
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

    public function actionList_onto()
    {
        if (\Yii::$app->request->getIsAjax())
        {
            $query= new Query();
            $rows='';
            $like='';
            if(isset($_GET['q']))
                $like=$_GET['q'];
            $rows = $query
                ->from('ontologia')
                ->orderBy(array('ontologia.idontologia'=>SORT_ASC))
                ->select('ontologia.*, ontologia.nombre as text ,ontologia.idontologia as id ')
                ->where('ontologia.nombre LIKE '."'%".$like."%'")
                ->all();
            $result['data']=$rows;
            $rows=$result;
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

    public function actionList_leng()
    {
        if (\Yii::$app->request->getIsAjax())
        {
            $query= new Query();
            $rows='';
            $like='';
            if(isset($_GET['q']))
                $like=$_GET['q'];
            $rows = $query
                ->from('lenguaje')
                ->orderBy(array('lenguaje.idlenguaje'=>SORT_ASC))
                ->select('lenguaje.*, lenguaje.nombre as text ,lenguaje.idlenguaje as id ')
                ->where('lenguaje.nombre LIKE '."'%".$like."%'")
                ->all();
            $result['data']=$rows;
            $rows=$result;
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


    public function actionList_catcient()
    {
        if (\Yii::$app->request->getIsAjax()) {
            $query = new Query();
            $rows = '';
            $like = '';
            if (isset($_GET['q']))
                $like = $_GET['q'];
            $rows = $query
                ->from('categoriacientifica')
                ->orderBy(array('categoriacientifica.idcatcientifica' => SORT_ASC))
                ->select('categoriacientifica.*,categoriacientifica.categcient as text ,categoriacientifica.idcatcientifica as id ')
                ->where('categoriacientifica.categcient LIKE ' . "'%" . $like . "%'")
                ->all();
            $result['data'] = $rows;
            $rows = $result;

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


    public function actionValidar_onto()
    {
        if (\Yii::$app->request->getIsAjax() && isset($_GET['Ontologia'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $condition = $_GET['Ontologia'];
            $ontologia = Ontologia::findByUK($condition);
            $jsonResult = array('valid' => true);
            if ($ontologia != null && $_GET['idontologia'] != $ontologia['idontologia'])
                $jsonResult = array('valid' => false);
            return $jsonResult;
        }
    }
    public function actionValidar_user()
    {
        if (\Yii::$app->request->getIsAjax() && isset($_GET['Usuario'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $condition = $_GET['Usuario'];
            $usuario = Usuario::findByUK($condition);
            $jsonResult = array('valid' => true);
            if ($usuario != null && $_GET['idusuario'] != $usuario['idusuario'])
                $jsonResult = array('valid' => false);
            return $jsonResult;
        }
    }



}