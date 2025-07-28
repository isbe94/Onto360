<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * TecnologiaSearch representa la clase busqueda del modeloTecnologia
 */
class TecnologiaSearch extends Tecnologia{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idtecnologia'],'integer'],
			[['tecnologia','direccion'],'safe'],
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
        $query = Tecnologia::find();
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
            'idtecnologia' => $this->idtecnologia,
            'tecnologia' => $this->tecnologia,
            'direccion' => $this->direccion
        ]);

        $query->andFilterWhere(['like', 'idtecnologia', $this->idtecnologia])
            ->andFilterWhere(['like', 'tecnologia', $this->tecnologia])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);
        return $dataProvider;
    }
}
