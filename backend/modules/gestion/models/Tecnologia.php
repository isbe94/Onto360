<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;

/** 
 * Este es la clase modelo para la tabla tecnologia.
 *
 * Los siguientes son los campos de la tabla 'tecnologia':

 * @property integer $idtecnologia
 * @property string $tecnologia
 * @property string $direccion

 * Los siguientes son las relaciones de este modelo :

 * @property Ontologia[] $arrayontologia
 */

class Tecnologia extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'tecnologia';
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
			[['tecnologia','direccion'],'required'],
			[['idtecnologia'],'integer'],
			[['tecnologia'], 'string', 'max'=>20],
			[['direccion'], 'string', 'max'=>100],
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
	     'idtecnologia'=>'Idtecnologia',
	     'tecnologia'=>'Tecnologia',
	     'direccion'=>'Direccion',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getArrayontologia()
		{
			return $this->hasMany(Ontologia::className(), ['id_tecnologia' => 'idtecnologia']);
		}

 	 /**
     * @inheritdoc
     * @return TecnologiaQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new TecnologiaQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Tecnologia::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Tecnologia::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
