<?php
/*Clase del Controladora del Modulo gestion*/
/*Generado by Pro Generator */
/*@author isbel  */

namespace backend\modules\gestion\controllers;
use yii\web\Controller;
use yii\web\View;
use yii\filters\AccessControl;
use app\themes\make\assets\php\AppAssetPlugins;
class DefaultController extends Controller 
{
	  /**
     * @inheritdoc
     */
    public function behaviors()
    {        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                   ],
                ],
            ],

        ];
    }
    public function actionIndex()
    {
		if (\Yii::$app->request->getIsAjax())
 		 {
			$this->view->js=[];
		 	$this->view->css=[];
		 	AppAssetPlugins::getPlugins_ComponentsCss($this->view);
          return $this->getView()->render('@backend/modules/gestion/views/default/index');
		 } 
		 else
		 {
		   AppAssetPlugins::setPlugins_ComponentsCss($this->view);
         return $this->render('index');
		 }
    }
	 public function actionLoad()
    {
        return $this->getView()->render('@backend/modules/gestion/views/default/load');
    }
}
