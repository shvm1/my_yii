<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $diet_id
 * @property integer $kit_id
 * @property integer $shipment_id
 * @property integer $address_id
 * @property integer $deliverytime_id
 * @property integer $discount
 * @property string $phone
 * @property string $email
 * @property integer $count_person
 * @property string $pay
 * @property string $comment
 * @property integer $status_pay
 * @property integer $status_del
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 *
 * @property Deliverytime $deliverytime
 * @property Address $address
 * @property Diet $diet
 * @property Kit $kit
 * @property Shipment $shipment
 * @property User $user
 * @property Orderday[] $orderdays
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'diet_id', 'kit_id', 'shipment_id', 'address_id', 'deliverytime_id', 'discount', 'count_person', 'status_pay', 'status_del', 'create_time', 'update_time', 'create_user_id', 'update_user_id'], 'integer'],
            [['phone'], 'required'],
            [['pay'], 'number'],
            [['phone', 'email', 'comment'], 'string', 'max' => 255],
            [['deliverytime_id'], 'exist', 'skipOnError' => true, 'targetClass' => Deliverytime::className(), 'targetAttribute' => ['deliverytime_id' => 'id']],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['diet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diet::className(), 'targetAttribute' => ['diet_id' => 'id']],
            [['kit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kit::className(), 'targetAttribute' => ['kit_id' => 'id']],
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
            'diet_id' => 'Diet ID',
            'kit_id' => 'Kit ID',
            'shipment_id' => 'Shipment ID',
            'address_id' => 'Address ID',
            'deliverytime_id' => 'Deliverytime ID',
            'discount' => 'Discount',
            'phone' => 'Phone',
            'email' => 'Email',
            'count_person' => 'Count Person',
            'pay' => 'Pay',
            'comment' => 'Comment',
            'status_pay' => 'Status Pay',
            'status_del' => 'Status Del',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_user_id' => 'Create User ID',
            'update_user_id' => 'Update User ID',
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
    public function getOrderdays()
    {
        return $this->hasMany(Orderday::className(), ['order_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrderQuery(get_called_class());
    }
}
