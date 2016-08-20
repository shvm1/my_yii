<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%shipment}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $price
 * @property integer $status_del
 *
 * @property Order[] $orders
 * @property Orderday[] $orderdays
 */
class Shipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shipment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['price'], 'number'],
            [['status_del'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'price' => 'Price',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['shipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdays()
    {
        return $this->hasMany(Orderday::className(), ['shipment_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ShipmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShipmentQuery(get_called_class());
    }
}
