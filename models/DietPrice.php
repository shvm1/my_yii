<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%diet_price}}".
 *
 * @property integer $diet_id
 * @property integer $kit_id
 * @property string $price
 *
 * @property Kit $kit
 * @property Diet $diet
 */
class DietPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%diet_price}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diet_id', 'kit_id'], 'required'],
            [['diet_id', 'kit_id'], 'integer'],
            [['price'], 'number'],
            [['kit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kit::className(), 'targetAttribute' => ['kit_id' => 'id']],
            [['diet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diet::className(), 'targetAttribute' => ['diet_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diet_id' => 'Diet ID',
            'kit_id' => 'Kit ID',
            'price' => 'Price',
        ];
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
    public function getDiet()
    {
        return $this->hasOne(Diet::className(), ['id' => 'diet_id']);
    }
}
