<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;

/** 
 * Este es la clase modelo para la tabla pregunta_respuestas.
 *
 * Los siguientes son los campos de la tabla 'pregunta_respuestas':

 * @property integer $idpregunta_respuestas
 * @property integer $id_respuesta
 * @property integer $id_pregunta
 * * @property integer $resp_correcta


 * Los siguientes son las relaciones de este modelo :

 
 * @property Pregunta $pregunta
 * @property Respuesta $respuesta
 */

class Pregunta_respuestas extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'pregunta_respuestas';
	}


		/**
	 	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

		return [
			[['respuesta','id_pregunta'],'required'],
			[['idpregunta_respuestas','id_respuesta','id_pregunta','resp_correcta'],'integer'],
			
 		];
 	}

 /**
     * @inheritdoc
     */
/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
	     'idpregunta_respuestas'=>'Idpregunta_respuestas',
	     'id_respuesta'=>'Id Respuesta',
	     'id_pregunta'=>'Id Pregunta',
	     'resp_correcta'=>'Respuesta correcta',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getRespuesta()
		{
			return $this->hasOne(Respuesta::className(), ['idrespuesta' => 'id_respuesta']);
		}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getPregunta()
		{
			return $this->hasOne(Pregunta::className(), ['idpregunta' => 'id_pregunta']);
		}

 	 /**
     * @inheritdoc
     * @return Pregunta_respuestasQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new Pregunta_respuestasQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Pregunta_respuestas::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Pregunta_respuestas::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
