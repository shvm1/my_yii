<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kit}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status_del
 *
 * @property DietPrice[] $dietPrices
 * @property Diet[] $diets
 * @property KitMeal[] $kitMeals
 * @property Meal[] $meals
 * @property Order[] $orders
 * @property Orderday[] $orderdays
 */
class Kit extends ARNoDelete
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%kit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status_del'], 'integer'],
            [['mealsArray'], 'safe'],
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
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDietPrices()
    {
        return $this->hasMany(DietPrice::className(), ['kit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiets()
    {
        return $this->hasMany(Diet::className(), ['id' => 'diet_id'])->viaTable('{{%diet_price}}', ['kit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKitMeals()
    {
        return $this->hasMany(KitMeal::className(), ['kit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeals()
    {
        return $this->hasMany(Meal::className(), ['id' => 'meal_id'])->viaTable('{{%kit_meal}}', ['kit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['kit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdays()
    {
        return $this->hasMany(Orderday::className(), ['kit_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\KitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\KitQuery(get_called_class());
    }
    
    private $_mealsArray;
    
    public function getMealsArray()
    {
        if ($this->_mealsArray === null) {
            $this->_mealsArray = $this->getMeals()->select('id')->column();
        }
        return $this->_mealsArray;
        
    }
    
    public function setMealsArray($value)
    {
        $this->_mealsArray = (array)$value;
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->updateMeals();
        parent::afterSave($insert, $changedAttributes);
    }

    private function updateMeals()
    {
        $currentMealIds = $this->getMeals()->select('id')->column();
        $newMealIds = $this->getMealsArray();

        foreach (array_filter(array_diff($newMealIds, $currentMealIds)) as $mealId) {
            /** @var Meal $meal */
            if ($meal = Meal::findOne($mealId)) {
                $this->link('meals', $meal);
            }
        }

        foreach (array_filter(array_diff($currentMealIds, $newMealIds)) as $mealId) {
            /** @var Meal $meal */
            if ($meal = Meal::findOne($mealId)) {
                $this->unlink('meals', $meal, true);
            }
        }
    }
}
