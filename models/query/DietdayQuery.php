<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Dietday]].
 *
 * @see \app\models\Dietday
 */
class DietdayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Dietday[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Dietday|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
