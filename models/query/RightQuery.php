<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Right]].
 *
 * @see Right
 */
class RightQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Right[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Right|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
