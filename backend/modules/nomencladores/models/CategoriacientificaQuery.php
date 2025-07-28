<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/

namespace backend\modules\nomencladores\models;


/** 
*  Esta es  ActiveQuery clase de [[Categoriacientifica]].
 *
 * @see Categoriacientifica
 */
/**
 * CategoriacientificaQuery representa la clase de Consulta del modeloCategoriacientifica
 */
class CategoriacientificaQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Categoriacientifica[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Categoriacientifica|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
