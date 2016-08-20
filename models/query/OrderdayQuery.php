<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Orderday]].
 *
 * @see \app\models\Orderday
 */
class OrderdayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Orderday[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Orderday|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
