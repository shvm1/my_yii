<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[Unit]].
 *
 * @see Unit
 */
class UnitQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status_del' => 0]);
    }

    /**
     * @inheritdoc
     * @return Unit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Unit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
