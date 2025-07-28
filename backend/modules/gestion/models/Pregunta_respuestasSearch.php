<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * Pregunta_respuestasSearch representa la clase busqueda del modeloPregunta_respuestas
 */
class Pregunta_respuestasSearch extends Pregunta_respuestas{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idpregunta_respuestas','id_respuesta','id_pregunta'],'integer'],
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
        $query = Pregunta_respuestas::find();
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
            'idpregunta_respuestas' => $this->idpregunta_respuestas,
            'id_respuesta' => $this->id_respuesta,
            'id_pregunta' => $this->id_pregunta
        ]);

        $query->andFilterWhere(['like', 'idpregunta_respuestas', $this->idpregunta_respuestas])
            ->andFilterWhere(['like', 'id_respuesta', $this->id_respuesta])
            ->andFilterWhere(['like', 'id_pregunta', $this->id_pregunta]);
        return $dataProvider;
    }
}
