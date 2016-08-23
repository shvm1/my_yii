<?php

namespace app\models\query;

use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[\app\models\Dietday]].
 *
 * @see \app\models\Dietday
 */
class DietdayQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['{{%dietday}}.status_del' => 0]);
    }

    public function forDietView()
    {
        return $this->active()->select(['{{%dietday}}.*','kal'=>new Expression('SUM({{%dish}}.kal)'),'protein'=>new Expression('SUM({{%dish}}.protein)'),'fat'=>new Expression('SUM({{%dish}}.fat)'),'carbohydrate'=>new Expression('SUM({{%dish}}.carbohydrate)')])
                ->joinWith(['dietdayMealDishes.dish'],false)
                ->groupBy('{{%dietday}}.id');
    }
    
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
