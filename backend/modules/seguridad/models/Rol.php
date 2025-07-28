<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/

namespace backend\modules\seguridad\models;

use Yii;

/** 
 * Este es la clase modelo para la tabla rol.
 *
 * Los siguientes son los campos de la tabla 'rol':

 * @property integer $idrol
 * @property string $rol

 * Los siguientes son las relaciones de este modelo :

 * @property Usuario[] $arrayusuario
 */

class Rol extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'rol';
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
			[['idrol'],'integer'],
			[['rol'], 'string', 'max'=>40],
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
	     'idrol'=>'Idrol',
	     'rol'=>'Rol',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getArrayusuario()
		{
			return $this->hasMany(Usuario::className(), ['id_rol' => 'idrol']);
		}

 	 /**
     * @inheritdoc
     * @return RolQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new RolQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Rol::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Rol::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
