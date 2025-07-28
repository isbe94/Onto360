<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/

namespace backend\modules\nomencladores\models;


/** 
*  Esta es  ActiveQuery clase de [[Clasificacion]].
 *
 * @see Clasificacion
 */
/**
 * ClasificacionQuery representa la clase de Consulta del modeloClasificacion
 */
class ClasificacionQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Clasificacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Clasificacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
