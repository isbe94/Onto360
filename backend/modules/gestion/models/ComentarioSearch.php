<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\gestion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * ComentarioSearch representa la clase busqueda del modeloComentario
 */
class ComentarioSearch extends Comentario{

	/**
	 * @return array validation rules for model attributes.
	 */	/**
     * @inheritdoc 
     */

	public function rules()
	{
	
		return [
			[['idcomentario','id_ontologia','id_usuario'],'integer'],
			[['comentario','fecha'],'safe'],
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
        $query = Comentario::find();
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
            'idcomentario' => $this->idcomentario,
            'comentario' => $this->comentario,
            'id_ontologia' => $this->id_ontologia,
            'fecha' => $this->fecha,
            'id_usuario' => $this->id_usuario
        ]);

        $query->andFilterWhere(['like', 'idcomentario', $this->idcomentario])
            ->andFilterWhere(['like', 'comentario', $this->comentario])
            ->andFilterWhere(['like', 'id_ontologia', $this->id_ontologia])
            ->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'id_usuario', $this->id_usuario]);
        return $dataProvider;
    }
}
