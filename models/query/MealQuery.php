<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Meal]].
 *
 * @see \app\models\Meal
 */
class MealQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status_del' => 0]);
    }

    /**
     * @inheritdoc
     * @return \app\models\Meal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Meal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
