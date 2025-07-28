<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Pregunta_respuestas]].
 *
 * @see Pregunta_respuestas
 */
/**
 * Pregunta_respuestasQuery representa la clase de Consulta del modeloPregunta_respuestas
 */
class pregunta_respuestasQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return pregunta_respuestas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return pregunta_respuestas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
