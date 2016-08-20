<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $login
 * @property string $name
 * @property string $pass
 * @property string $hash
 * @property string $phone
 * @property string $email
 * @property integer $usergroup_id
 * @property integer $status_del
 *
 * @property Address[] $addresses
 * @property Order[] $orders
 * @property Orderday[] $orderdays
 * @property Usergroup $usergroup
 * @property UserRight[] $userRights
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usergroup_id', 'status_del'], 'integer'],
            [['login', 'name', 'pass', 'hash', 'phone', 'email'], 'string', 'max' => 255],
            [['usergroup_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usergroup::className(), 'targetAttribute' => ['usergroup_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'name' => 'Name',
            'pass' => 'Pass',
            'hash' => 'Hash',
            'phone' => 'Phone',
            'email' => 'Email',
            'usergroup_id' => 'Usergroup ID',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdays()
    {
        return $this->hasMany(Orderday::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsergroup()
    {
        return $this->hasOne(Usergroup::className(), ['id' => 'usergroup_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRights()
    {
        return $this->hasMany(UserRight::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientQuery(get_called_class());
    }
}
