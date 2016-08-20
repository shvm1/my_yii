<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%deliverytime}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $color
 * @property integer $sort
 * @property integer $status_del
 *
 * @property Order[] $orders
 * @property Orderday[] $orderdays
 */
class Deliverytime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%deliverytime}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'color'], 'required'],
            [['sort', 'status_del'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'color' => 'Color',
            'sort' => 'Sort',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['deliverytime_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdays()
    {
        return $this->hasMany(Orderday::className(), ['deliverytime_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\DeliverytimeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DeliverytimeQuery(get_called_class());
    }
}
