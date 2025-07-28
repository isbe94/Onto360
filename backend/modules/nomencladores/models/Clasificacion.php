<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/

namespace backend\modules\nomencladores\models;

use Yii;
use backend\modules\gestion\models\Clasificacion_ontologia;

/** 
 * Este es la clase modelo para la tabla clasificacion.
 *
 * Los siguientes son los campos de la tabla 'clasificacion':

 * @property integer $idclasificacion
 * @property string $clasificacion

 * Los siguientes son las relaciones de este modelo :

 * @property Clasificacion_ontologia[] $arrayclasificacion_ontologia
 */

class Clasificacion extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'clasificacion';
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
			[['clasificacion'],'required'],
			[['idclasificacion'],'integer'],
			[['clasificacion'], 'string', 'max'=>50],
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
	     'idclasificacion'=>'Idclasificacion',
	     'clasificacion'=>'Clasificacion',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getArrayclasificacion_ontologia()
		{
			return $this->hasMany(Clasificacion_ontologia::className(), ['id_clasificacion' => 'idclasificacion']);
		}

 	 /**
     * @inheritdoc
     * @return ClasificacionQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new ClasificacionQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Clasificacion::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Clasificacion::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
