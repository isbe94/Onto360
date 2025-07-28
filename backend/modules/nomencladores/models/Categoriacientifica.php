<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/

namespace backend\modules\nomencladores\models;

use Yii;
use backend\modules\seguridad\models\Usuario;

/** 
 * Este es la clase modelo para la tabla categoriacientifica.
 *
 * Los siguientes son los campos de la tabla 'categoriacientifica':

 * @property integer $idcatcientifica
 * @property string $categcient

 * Los siguientes son las relaciones de este modelo :

 * @property Usuario[] $arrayusuario
 */

class Categoriacientifica extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'categoriacientifica';
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
			[['idcatcientifica'],'integer'],
			[['categcient'], 'string', 'max'=>30],
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
	     'idcatcientifica'=>'Idcatcientifica',
	     'categcient'=>'Categcient',
		];
	}

	 /**
     * @return \yii\db\ActiveQuery
     */
	  public function getArrayusuario()
		{
			return $this->hasMany(Usuario::className(), ['id_catcientifica' => 'idcatcientifica']);
		}

 	 /**
     * @inheritdoc
     * @return CategoriacientificaQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new CategoriacientificaQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Categoriacientifica::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Categoriacientifica::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
