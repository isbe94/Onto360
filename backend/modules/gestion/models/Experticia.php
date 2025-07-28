<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use backend\modules\seguridad\models\Usuario;

/** 
 * Este es la clase modelo para la tabla experticia.
 *
 * Los siguientes son los campos de la tabla 'experticia':

 * @property integer $idexperticia
 * @property string $grado_experiencia

 * Los siguientes son las relaciones de este modelo :

 * @property Usuario[] $arrayusuario
 */

class Experticia extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'experticia';
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
			[['idexperticia'],'integer'],
			[['grado_experiencia'], 'string', 'max'=>20],
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
	     'idexperticia'=>'Idexperticia',
	     'grado_experiencia'=>'Grado Experiencia',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getArrayusuario()
		{
			return $this->hasMany(Usuario::className(), ['id_experticia' => 'idexperticia']);
		}

 	 /**
     * @inheritdoc
     * @return ExperticiaQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new ExperticiaQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Experticia::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Experticia::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
