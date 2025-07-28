<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/

namespace backend\modules\nomencladores\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * ClasificacionSearch representa la clase busqueda del modeloClasificacion
 */
class ClasificacionSearch extends Clasificacion{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idclasificacion'],'integer'],
			[['clasificacion'],'safe'],
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
        $query = Clasificacion::find();
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
            'idclasificacion' => $this->idclasificacion,
            'clasificacion' => $this->clasificacion
        ]);

        $query->andFilterWhere(['like', 'idclasificacion', $this->idclasificacion])
            ->andFilterWhere(['like', 'clasificacion', $this->clasificacion]);
        return $dataProvider;
    }
}
