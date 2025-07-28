<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Ontologia]].
 *
 * @see Ontologia
 */
/**
 * OntologiaQuery representa la clase de Consulta del modeloOntologia
 */
class OntologiaQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Ontologia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ontologia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
