<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Tecnologia]].
 *
 * @see Tecnologia
 */
/**
 * TecnologiaQuery representa la clase de Consulta del modeloTecnologia
 */
class TecnologiaQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Tecnologia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tecnologia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
