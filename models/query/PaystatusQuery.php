<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Paystatus]].
 *
 * @see Paystatus
 */
class PaystatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Paystatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Paystatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
