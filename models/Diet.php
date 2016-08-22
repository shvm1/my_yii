<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%diet}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $kal
 * @property integer $status_del
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 *
 * @property DietPrice[] $dietPrices
 * @property Kit[] $kits
 * @property Dietday[] $dietdays
 * @property Order[] $orders
 * @property Orderday[] $orderdays
 */
class Diet extends \yii\db\ActiveRecord
{
    public $count_day;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%diet}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'kal'], 'required'],
            [['kal', 'status_del', 'create_time', 'update_time', 'create_user_id', 'update_user_id'], 'integer'],
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
            'kal' => 'Kal',
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
    public function getDietPrices()
    {
        return $this->hasMany(DietPrice::className(), ['diet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKits()
    {
        return $this->hasMany(Kit::className(), ['id' => 'kit_id'])->viaTable('{{%diet_price}}', ['diet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDietdays()
    {
        return $this->hasMany(Dietday::className(), ['diet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['diet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdays()
    {
        return $this->hasMany(Orderday::className(), ['diet_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\DietQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DietQuery(get_called_class());
    }
}
