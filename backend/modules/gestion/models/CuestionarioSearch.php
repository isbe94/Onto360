<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * CuestionarioSearch representa la clase busqueda del modeloCuestionario
 */
class CuestionarioSearch extends Cuestionario{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idcuestionario','id_respuesta','id_pregunta'],'integer'],
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
        $query = Cuestionario::find();
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
            'idcuestionario' => $this->idcuestionario,
            'id_respuesta' => $this->id_respuesta,
            'id_pregunta' => $this->id_pregunta
        ]);

        $query->andFilterWhere(['like', 'idcuestionario', $this->idcuestionario])
            ->andFilterWhere(['like', 'id_respuesta', $this->id_respuesta])
            ->andFilterWhere(['like', 'id_pregunta', $this->id_pregunta]);
        return $dataProvider;
    }
}
