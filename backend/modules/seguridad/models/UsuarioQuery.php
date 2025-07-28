<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/

namespace backend\modules\seguridad\models;


/** 
*  Esta es  ActiveQuery clase de [[Usuario]].
 *
 * @see Usuario
 */
/**
 * UsuarioQuery representa la clase de Consulta del modeloUsuario
 */
class UsuarioQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Usuario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Usuario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
