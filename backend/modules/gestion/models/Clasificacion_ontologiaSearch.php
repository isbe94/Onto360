<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * Clasificacion_ontologiaSearch representa la clase busqueda del modeloClasificacion_ontologia
 */
class Clasificacion_ontologiaSearch extends Clasificacion_ontologia{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idclasifonto','id_ontologia','id_clasificacion'],'integer'],
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
        $query = Clasificacion_ontologia::find();
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
            'idclasifonto' => $this->idclasifonto,
            'id_ontologia' => $this->id_ontologia,
            'id_clasificacion' => $this->id_clasificacion
        ]);

        $query->andFilterWhere(['like', 'idclasifonto', $this->idclasifonto])
            ->andFilterWhere(['like', 'id_ontologia', $this->id_ontologia])
            ->andFilterWhere(['like', 'id_clasificacion', $this->id_clasificacion]);
        return $dataProvider;
    }
}
