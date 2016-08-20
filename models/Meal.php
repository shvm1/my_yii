<?php

namespace app\models;

use Yii;
use app\models\ARNoDelete;
/**
 * This is the model class for table "{{%meal}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $sort
 * @property integer $status_del
 *
 * @property DietdayMealDish[] $dietdayMealDishes
 * @property KitMeal[] $kitMeals
 * @property Kit[] $kits
 * @property OrderdayMealDish[] $orderdayMealDishes
 */
class Meal extends ARNoDelete
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%meal}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','sort'], 'required'],
            [['sort', 'status_del'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'title' => 'Название',
            'sort' => 'Сортировка',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDietdayMealDishes()
    {
        return $this->hasMany(DietdayMealDish::className(), ['meal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKitMeals()
    {
        return $this->hasMany(KitMeal::className(), ['meal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKits()
    {
        return $this->hasMany(Kit::className(), ['id' => 'kit_id'])->viaTable('{{%kit_meal}}', ['meal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdayMealDishes()
    {
        return $this->hasMany(OrderdayMealDish::className(), ['meal_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\MealQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\MealQuery(get_called_class());
    }
}
