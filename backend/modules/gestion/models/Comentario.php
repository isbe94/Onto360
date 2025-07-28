<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use backend\modules\seguridad\models\Usuario;

/** 
 * Este es la clase modelo para la tabla comentario.
 *
 * Los siguientes son los campos de la tabla 'comentario':

 * @property integer $idcomentario
 * @property string $comentario
 * @property integer $id_ontologia
 * @property date $fecha
 * @property integer $id_usuario

 * Los siguientes son las relaciones de este modelo :

 * @property Ontologia $ontologia
 * @property Usuario $usuario
 */

class Comentario extends \yii\db\ActiveRecord 
{

	/** 
	 * @return string the associated database table name
	 */
	/**
     * @inheritdoc 
     */
	public static function tableName()
	{
		return 'comentario';
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
			[['id_ontologia','id_usuario'],'required'],
			[['idcomentario','id_ontologia','id_usuario'],'integer'],
			[['fecha'],'safe'],
			[['comentario'], 'string', 'max'=>65535],
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
	     'idcomentario'=>'Idcomentario',
	     'comentario'=>'Comentario',
	     'id_ontologia'=>'Id Ontologia',
	     'fecha'=>'Fecha',
	     'id_usuario'=>'Id Usuario',
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
	  public function getUsuario()
		{
			return $this->hasOne(Usuario::className(), ['idusuario' => 'id_usuario']);
		}

 	 /**
     * @inheritdoc
     * @return ComentarioQuery the active query used by this AR class.
     */
    	public static function find()
    	{
        return new ComentarioQuery(get_called_class());
    	}
/** 
*  Function to find by unique parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findByUK($condition)	{

		$query=Comentario::find()->where($condition);
		return $query->asArray()->one();
	
	}
/** 
*  Function to find all by parameters.
   @parameters  Array of each value on the unique Key*
 */
	public  static function findAllByCondition($condition)	{

		$query=Comentario::find()->where($condition);
		return $query->asArray();
	
	}
}
 ?>
