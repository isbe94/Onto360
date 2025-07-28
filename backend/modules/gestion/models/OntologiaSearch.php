<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * OntologiaSearch representa la clase busqueda del modeloOntologia
 */
class OntologiaSearch extends Ontologia{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idontologia','id_tecnologia'],'integer'],
			[['dominio','fichero','nombre'],'safe'],
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
        $query = Ontologia::find();
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
            'idontologia' => $this->idontologia,
            'dominio' => $this->dominio,
            'fichero' => $this->fichero,
            'nombre' => $this->nombre,
            'id_tecnologia' => $this->id_tecnologia
        ]);

        $query->andFilterWhere(['like', 'idontologia', $this->idontologia])
            ->andFilterWhere(['like', 'dominio', $this->dominio])
            ->andFilterWhere(['like', 'fichero', $this->fichero])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'id_tecnologia', $this->id_tecnologia]);
        return $dataProvider;
    }
}
