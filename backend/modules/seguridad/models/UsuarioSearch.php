<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\seguridad\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * UsuarioSearch representa la clase busqueda del modeloUsuario
 */
class UsuarioSearch extends Usuario{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idusuario','id_rol','activo','experto','id_catcientifica','id_experticia'],'integer'],
			[['usuario','nombre','contrasena','auth_key','created_at','updated_at','avatar','apellido1','apellido2','correo'],'safe'],
 		];
 	}

  	 /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


	 /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider

     */

    public function search($params)
    {
        $query = Usuario::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

           return $dataProvider;
        }

        $query->andFilterWhere([
            'usuario' => $this->usuario,
            'nombre' => $this->nombre,
            'contrasena' => $this->contrasena,
            'idusuario' => $this->idusuario,
            'id_rol' => $this->id_rol,
            'auth_key' => $this->auth_key,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'avatar' => $this->avatar,
            'apellido1' => $this->apellido1,
            'apellido2' => $this->apellido2,
            'activo' => $this->activo,
            'experto' => $this->experto,
            'id_catcientifica' => $this->id_catcientifica,
            'id_experticia' => $this->id_experticia,
            'correo' => $this->correo
        ]);

        $query->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'contrasena', $this->contrasena])
            ->andFilterWhere(['like', 'idusuario', $this->idusuario])
            ->andFilterWhere(['like', 'id_rol', $this->id_rol])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'apellido1', $this->apellido1])
            ->andFilterWhere(['like', 'apellido2', $this->apellido2])
            ->andFilterWhere(['like', 'activo', $this->activo])
            ->andFilterWhere(['like', 'experto', $this->experto])
            ->andFilterWhere(['like', 'id_catcientifica', $this->id_catcientifica])
            ->andFilterWhere(['like', 'id_experticia', $this->id_experticia])
            ->andFilterWhere(['like', 'correo', $this->correo]);
        return $dataProvider;
    }
}
