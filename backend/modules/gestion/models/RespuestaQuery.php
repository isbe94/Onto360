<?php 
/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/

namespace backend\modules\gestion\models;


/** 
*  Esta es  ActiveQuery clase de [[Respuesta]].
 *
 * @see Respuesta
 */
/**
 * RespuestaQuery representa la clase de Consulta del modeloRespuesta
 */
class RespuestaQuery extends \yii\db\ActiveQuery{
/*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Respuesta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Respuesta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
