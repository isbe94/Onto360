<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/

namespace backend\modules\seguridad\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * RolSearch representa la clase busqueda del modeloRol
 */
class RolSearch extends Rol{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idrol'],'integer'],
			[['rol'],'safe'],
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
        $query = Rol::find();
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
            'idrol' => $this->idrol,
            'rol' => $this->rol
        ]);

        $query->andFilterWhere(['like', 'idrol', $this->idrol])
            ->andFilterWhere(['like', 'rol', $this->rol]);
        return $dataProvider;
    }
}
