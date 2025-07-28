<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * RespuestaSearch representa la clase busqueda del modeloRespuesta
 */
class RespuestaSearch extends Respuesta{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idrespuesta'],'integer'],
			[['respuesta'],'safe'],
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
        $query = Respuesta::find();
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
            'idrespuesta' => $this->idrespuesta,
            'respuesta' => $this->respuesta
        ]);

        $query->andFilterWhere(['like', 'idrespuesta', $this->idrespuesta])
            ->andFilterWhere(['like', 'respuesta', $this->respuesta]);
        return $dataProvider;
    }
}
