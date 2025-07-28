<?php 
/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Mon Oct 23 10:17:51 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Lenguaje]].
 *
 * @see Lenguaje
 */
/**
 * LenguajeQuery representa la clase de Consulta del modeloLenguaje
 */
class LenguajeQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Lenguaje[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Lenguaje|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
