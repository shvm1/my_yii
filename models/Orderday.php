<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%orderday}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_id
 * @property integer $diet_id
 * @property integer $kit_id
 * @property integer $shipment_id
 * @property integer $address_id
 * @property integer $deliverytime_id
 * @property integer $num
 * @property string $dateday
 * @property integer $status_del
 *
 * @property Deliverytime $deliverytime
 * @property Address $address
 * @property Diet $diet
 * @property Kit $kit
 * @property Order $order
 * @property Shipment $shipment
 * @property User $user
 * @property OrderdayMealDish[] $orderdayMealDishes
 * @property OrderdayService[] $orderdayServices
 */
class Orderday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orderday}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_id', 'diet_id', 'kit_id', 'shipment_id', 'address_id', 'deliverytime_id', 'num', 'status_del'], 'integer'],
            [['dateday'], 'safe'],
            [['deliverytime_id'], 'exist', 'skipOnError' => true, 'targetClass' => Deliverytime::className(), 'targetAttribute' => ['deliverytime_id' => 'id']],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['diet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diet::className(), 'targetAttribute' => ['diet_id' => 'id']],
            [['kit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kit::className(), 'targetAttribute' => ['kit_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['shipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shipment::className(), 'targetAttribute' => ['shipment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'diet_id' => 'Diet ID',
            'kit_id' => 'Kit ID',
            'shipment_id' => 'Shipment ID',
            'address_id' => 'Address ID',
            'deliverytime_id' => 'Deliverytime ID',
            'num' => 'Num',
            'dateday' => 'Dateday',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliverytime()
    {
        return $this->hasOne(Deliverytime::className(), ['id' => 'deliverytime_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiet()
    {
        return $this->hasOne(Diet::className(), ['id' => 'diet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKit()
    {
        return $this->hasOne(Kit::className(), ['id' => 'kit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipment()
    {
        return $this->hasOne(Shipment::className(), ['id' => 'shipment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdayMealDishes()
    {
        return $this->hasMany(OrderdayMealDish::className(), ['orderday_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdayServices()
    {
        return $this->hasMany(OrderdayService::className(), ['orderday_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\OrderdayQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrderdayQuery(get_called_class());
    }
}
