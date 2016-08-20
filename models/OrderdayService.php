<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%orderday_service}}".
 *
 * @property integer $id
 * @property integer $orderday_id
 * @property integer $service_id
 *
 * @property Service $service
 * @property Orderday $orderday
 */
class OrderdayService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orderday_service}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderday_id'], 'required'],
            [['orderday_id', 'service_id'], 'integer'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
            [['orderday_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orderday::className(), 'targetAttribute' => ['orderday_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderday_id' => 'Orderday ID',
            'service_id' => 'Service ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderday()
    {
        return $this->hasOne(Orderday::className(), ['id' => 'orderday_id']);
    }
}
