<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;

/** 
 * Este es la clase modelo para la tabla cuestionario.
 *
 * Los siguientes son los campos de la tabla 'cuestionario':

 * @property integer $idcuestionario
 * @property integer $id_respuesta
 * @property integer $id_pregunta
 * * @property integer $resp_correcta


 * Los siguientes son las relaciones de este modelo :

 
 * @property Pregunta $pregunta
 * @property Respuesta $respuesta
 */

class Cuestionario extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'cuestionario';
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
			[['idcuestionario','id_respuesta','id_pregunta','resp_correcta'],'integer'],
			
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
	     'idcuestionario'=>'Idcuestionario',
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
     * @return CuestionarioQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new CuestionarioQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Cuestionario::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Cuestionario::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
