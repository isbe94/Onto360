<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Mon Oct 23 10:17:51 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * LenguajeSearch representa la clase busqueda del modeloLenguaje
 */
class LenguajeSearch extends Lenguaje{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idlenguaje'],'integer'],
			[['lenguaje'],'safe'],
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
        $query = Lenguaje::find();
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
            'idlenguaje' => $this->idlenguaje,
            'lenguaje' => $this->lenguaje
        ]);

        $query->andFilterWhere(['like', 'idlenguaje', $this->idlenguaje])
            ->andFilterWhere(['like', 'lenguaje', $this->lenguaje]);
        return $dataProvider;
    }
}
