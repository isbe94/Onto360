<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * ExperticiaSearch representa la clase busqueda del modeloExperticia
 */
class ExperticiaSearch extends Experticia{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idexperticia'],'integer'],
			[['grado_experiencia'],'safe'],
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
        $query = Experticia::find();
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
            'idexperticia' => $this->idexperticia,
            'grado_experiencia' => $this->grado_experiencia
        ]);

        $query->andFilterWhere(['like', 'idexperticia', $this->idexperticia])
            ->andFilterWhere(['like', 'grado_experiencia', $this->grado_experiencia]);
        return $dataProvider;
    }
}
