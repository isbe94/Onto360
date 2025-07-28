<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Experticia]].
 *
 * @see Experticia
 */
/**
 * ExperticiaQuery representa la clase de Consulta del modeloExperticia
 */
class ExperticiaQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Experticia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Experticia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
