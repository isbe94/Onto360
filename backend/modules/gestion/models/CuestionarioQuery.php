<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Cuestionario]].
 *
 * @see Cuestionario
 */
/**
 * CuestionarioQuery representa la clase de Consulta del modeloCuestionario
 */
class CuestionarioQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Cuestionario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cuestionario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
