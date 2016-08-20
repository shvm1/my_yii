<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property integer $id
 * @property string $address
 * @property integer $user_id
 * @property integer $status_del
 *
 * @property User $user
 * @property Order[] $orders
 * @property Orderday[] $orderdays
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status_del'], 'integer'],
            [['address'], 'string', 'max' => 255],
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
            'address' => 'Address',
            'user_id' => 'User ID',
            'status_del' => 'Status Del',
        ];
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
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['address_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdays()
    {
        return $this->hasMany(Orderday::className(), ['address_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AddressQuery(get_called_class());
    }
}
