<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $price
 * @property integer $status_del
 *
 * @property OrderdayService[] $orderdayServices
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service}}';
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
    public function getOrderdayServices()
    {
        return $this->hasMany(OrderdayService::className(), ['service_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceQuery(get_called_class());
    }
}
