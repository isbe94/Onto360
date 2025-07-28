<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Clasificacion_ontologia]].
 *
 * @see Clasificacion_ontologia
 */
/**
 * Clasificacion_ontologiaQuery representa la clase de Consulta del modeloClasificacion_ontologia
 */
class Clasificacion_ontologiaQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Clasificacion_ontologia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Clasificacion_ontologia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
