<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/

namespace backend\modules\seguridad\models;


/** 
*  Esta es  ActiveQuery clase de [[Rol]].
 *
 * @see Rol
 */
/**
 * RolQuery representa la clase de Consulta del modeloRol
 */
class RolQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Rol[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rol|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
