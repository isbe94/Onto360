<?php
/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\models;

use backend\modules\seguridad\models\Usuario;
use Yii;

/**
 * Este es la clase modelo para la tabla ontologia.
 *
 * Los siguientes son los campos de la tabla 'ontologia':

 * @property integer $idontologia
 * @property string $dominio
 * @property string $fichero
 * @property string $nombre
 * @property integer $id_tecnologia
 * @property integer $id_usuario
 * @property integer $id_lenguaje
 * @property string $name_space
 * @property float $version


 * Los siguientes son las relaciones de este modelo :


 * @property Usuario $usuario
 * @property Lenguaje $lenguaje
 * @property Clasificacion_ontologia[] $arrayclasificacion_ontologia
 * @property Comentario[] $arraycomentario
 */

class Ontologia extends \yii\db\ActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ontologia';
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
			[['dominio','fichero','nombre','version'],'required'],
			[['idontologia','id_usuario','id_lenguaje'],'integer'],
			[['dominio'], 'string', 'max'=>1000000],
			[['fichero'], 'string', 'max'=>1000000],
			[['nombre'], 'string', 'max'=>40],
			[['name_space'], 'string', 'max'=>500],

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
			'idontologia'=>'Idontologia',
			'dominio'=>'Dominio',
			'fichero'=>'Fichero',
			'nombre'=>'Nombre',
			'id_usuario'=>'Id Usuario',
			'name_space'=>'Namespace',
			'version'=>'Version',
			'id_lenguaje'=>'Lenguaje',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTecnologia()
	{
		return $this->hasOne(Tecnologia::className(), ['idtecnologia' => 'id_tecnologia']);
	}

	public function getUsuario()
	{
		return $this->hasOne(Usuario::className(), ['idusuario' => 'id_usuario']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArrayclasificacion_ontologia()
	{
		return $this->hasMany(Clasificacion_ontologia::className(), ['id_ontologia' => 'idontologia']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArraycomentario()
	{
		return $this->hasMany(Comentario::className(), ['id_ontologia' => 'idontologia']);
	}

	/**
	 * @inheritdoc
	 * @return OntologiaQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new OntologiaQuery(get_called_class());
	}
	/**
	 *  Function to find by unique parameters.
	@parameters  Array of each value on the unique Key*
	 */
	public  static function findByUK($condition)	{

		$query=Ontologia::find()->where($condition);
		return $query->asArray()->one();

	}
	/**
	 *  Function to find all by parameters.
	@parameters  Array of each value on the unique Key*
	 */
	public  static function findAllByCondition($condition)	{

		$query=Ontologia::find()->where($condition);
		return $query->asArray();

	}
}
?>
