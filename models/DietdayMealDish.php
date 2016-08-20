<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%dietday_meal_dish}}".
 *
 * @property integer $id
 * @property integer $dietday_id
 * @property integer $meal_id
 * @property integer $dish_id
 * @property double $value
 *
 * @property Dish $dish
 * @property Dietday $dietday
 * @property Meal $meal
 */
class DietdayMealDish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dietday_meal_dish}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dietday_id', 'meal_id'], 'required'],
            [['dietday_id', 'meal_id', 'dish_id'], 'integer'],
            [['value'], 'number'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['dish_id' => 'id']],
            [['dietday_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dietday::className(), 'targetAttribute' => ['dietday_id' => 'id']],
            [['meal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meal::className(), 'targetAttribute' => ['meal_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dietday_id' => 'Dietday ID',
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
    public function getDietday()
    {
        return $this->hasOne(Dietday::className(), ['id' => 'dietday_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeal()
    {
        return $this->hasOne(Meal::className(), ['id' => 'meal_id']);
    }
}
