<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;

/** 
 * Este es la clase modelo para la tabla pregunta.
 *
 * Los siguientes son los campos de la tabla 'pregunta':

 * @property integer $idpregunta
 * @property string $pregunta

 * Los siguientes son las relaciones de este modelo :

 * @property pregunta_respuestas[] $arraypregunta_respuestas
 */

class Pregunta extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'pregunta';
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
			[['pregunta'],'required'],
			[['idpregunta'],'integer'],
			[['pregunta'], 'string', 'max'=>500],
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
	     'idpregunta'=>'Idpregunta',
	     'pregunta'=>'Pregunta',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getArraypregunta_respuestas()
		{
			return $this->hasMany(pregunta_respuestas::className(), ['id_pregunta' => 'idpregunta']);
		}

 	 /**
     * @inheritdoc
     * @return PreguntaQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new PreguntaQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Pregunta::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Pregunta::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
