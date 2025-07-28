<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use backend\modules\nomencladores\models\Clasificacion;

/** 
 * Este es la clase modelo para la tabla clasificacion_ontologia.
 *
 * Los siguientes son los campos de la tabla 'clasificacion_ontologia':

 * @property integer $idclasifonto
 * @property integer $id_ontologia
 * @property integer $id_clasificacion

 * Los siguientes son las relaciones de este modelo :

 * @property Ontologia $ontologia
 * @property Clasificacion $clasificacion
 */

class Clasificacion_ontologia extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'clasificacion_ontologia';
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
			[['id_ontologia','id_clasificacion'],'required'],
			[['idclasifonto','id_ontologia','id_clasificacion'],'integer'],
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
	     'idclasifonto'=>'Idclasifonto',
	     'id_ontologia'=>'Id Ontologia',
	     'id_clasificacion'=>'Id Clasificacion',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getOntologia()
		{
			return $this->hasOne(Ontologia::className(), ['idontologia' => 'id_ontologia']);
		}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getClasificacion()
		{
			return $this->hasOne(Clasificacion::className(), ['idclasificacion' => 'id_clasificacion']);
		}

 	 /**
     * @inheritdoc
     * @return Clasificacion_ontologiaQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new Clasificacion_ontologiaQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Clasificacion_ontologia::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Clasificacion_ontologia::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
