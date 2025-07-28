<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/

namespace backend\modules\nomencladores\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * CategoriacientificaSearch representa la clase busqueda del modeloCategoriacientifica
 */
class CategoriacientificaSearch extends Categoriacientifica{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idcatcientifica'],'integer'],
			[['categcient'],'safe'],
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
        $query = Categoriacientifica::find();
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
            'idcatcientifica' => $this->idcatcientifica,
            'categcient' => $this->categcient
        ]);

        $query->andFilterWhere(['like', 'idcatcientifica', $this->idcatcientifica])
            ->andFilterWhere(['like', 'categcient', $this->categcient]);
        return $dataProvider;
    }
}
