<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%orderday_meal_dish}}".
 *
 * @property integer $id
 * @property integer $orderday_id
 * @property integer $meal_id
 * @property integer $dish_id
 * @property double $value
 *
 * @property Dish $dish
 * @property Meal $meal
 * @property Orderday $orderday
 */
class OrderdayMealDish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orderday_meal_dish}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderday_id', 'meal_id'], 'required'],
            [['orderday_id', 'meal_id', 'dish_id'], 'integer'],
            [['value'], 'number'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['dish_id' => 'id']],
            [['meal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meal::className(), 'targetAttribute' => ['meal_id' => 'id']],
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
            'meal_id' => 'Meal ID',
            'dish_id' => 'Dish ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dish::className(), ['id' => 'dish_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeal()
    {
        return $this->hasOne(Meal::className(), ['id' => 'meal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderday()
    {
        return $this->hasOne(Orderday::className(), ['id' => 'orderday_id']);
    }
}
