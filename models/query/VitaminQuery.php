<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Vitamin]].
 *
 * @see \app\models\Vitamin
 */
class VitaminQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status_del' => 0]);
    }

    /**
     * @inheritdoc
     * @return \app\models\Vitamin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Vitamin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
