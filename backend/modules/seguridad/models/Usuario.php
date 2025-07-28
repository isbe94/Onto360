<?php
/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\seguridad\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\modules\nomencladores\models\Categoriacientifica;
use backend\modules\gestion\models\Experticia;
use backend\modules\gestion\models\Comentario;

/**
 * Este es la clase modelo para la tabla usuario.
 *
 * Los siguientes son los campos de la tabla 'usuario':
 * @property string $usuario
 * @property char $nombre
 * @property string $contrasena
 * @property integer $idusuario
 * @property integer $id_rol
 * @property string $auth_key
 * @property date $created_at
 * @property date $updated_at
 * @property string $avatar
 * @property string $apellido1
 * @property string $apellido2
 * @property integer $activo
 * @property integer $id_catcientifica
 * @property integer $id_experticia
 * @property string $correo
 * Los siguientes son las relaciones de este modelo :
 * @property Rol $rol
 * @property Categoriacientifica $categoriacientifica
 * @property Experticia $experticia
 * @property Comentario[] $arraycomentario
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * @return string the associated database table name
     */
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }


    /**
     * @return array validation rules for model attributes.
     */
    /**
     * @inheritdoc
     */

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.

        return [
            [['usuario', 'contrasena', 'id_rol', 'activo', 'id_catcientifica'], 'required'],
            [['idusuario', 'id_rol', 'activo', 'id_catcientifica', 'id_experticia'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['usuario', 'nombre'], 'string', 'max' => 64],
            [['contrasena', 'avatar'], 'string', 'max' => 45],
            [['auth_key'], 'string', 'max' => 255],
            [['apellido1'], 'string', 'max' => 40],
            [['apellido2'], 'string', 'max' => 20],
            [['correo'], 'string', 'max' => 50],
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
            'usuario' => 'Usuario',
            'nombre' => 'Nombre',
            'contrasena' => 'Contrasena',
            'idusuario' => 'Idusuario',
            'id_rol' => 'Id Rol',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'avatar' => 'Avatar',
            'apellido1' => 'Apellido1',
            'apellido2' => 'Apellido2',
            'activo' => 'Activo',
            'id_catcientifica' => 'Id Catcientifica',
            'id_experticia' => 'Id Experticia',
            'correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['idrol' => 'id_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriacientifica()
    {
        return $this->hasOne(Categoriacientifica::className(), ['idcatcientifica' => 'id_catcientifica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperticia()
    {
        return $this->hasOne(Experticia::className(), ['idexperticia' => 'id_experticia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArraycomentario()
    {
        return $this->hasMany(Comentario::className(), ['id_usuario' => 'idusuario']);
    }

    /**
     * @inheritdoc
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }

    /**
     *  Function to find by unique parameters.
     * @parameters  Array of each value on the unique Key*
     */
    public static function findByUK($condition)
    {

        $query = Usuario::find()->where($condition);
        return $query->asArray()->one();

    }

    /**
     *  Function to find all by parameters.
     * @parameters  Array of each value on the unique Key*
     */
    public static function findAllByCondition($condition)
    {

        $query = Usuario::find()->where($condition);
        return $query->asArray();

    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['idusuario' => $id, 'activo' => 1]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        if (strpos(Yii::$app->id, "frontend")) {
            return static::findOne(['usuario' => $username, 'activo' => 1]);

        }
        if (strpos(Yii::$app->id, "backend")) {
            $id_rol = 1;
            return static::findOne(['usuario' => $username, 'activo' => 1, 'id_rol' => $id_rol]);
        }
    }


    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'activo' => 1]);

    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return md5($password)== $this->contrasena;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}

?>
