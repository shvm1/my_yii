<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%dish}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $kal
 * @property double $protein
 * @property double $fat
 * @property double $carbohydrate
 * @property string $url
 * @property string $image
 * @property integer $weight
 * @property string $description
 * @property string $price
 * @property integer $status_del
 *
 * @property DietdayMealDish[] $dietdayMealDishes
 * @property DishVitamin[] $dishVitamins
 * @property OrderdayMealDish[] $orderdayMealDishes
 */
class Dish extends ARNoDelete
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dish}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['kal', 'weight', 'status_del'], 'integer'],
            [['protein', 'fat', 'carbohydrate', 'price'], 'number'],
            [['title', 'url', 'image', 'description'], 'string', 'max' => 255],
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
            'protein' => 'Protein',
            'fat' => 'Fat',
            'carbohydrate' => 'Carbohydrate',
            'url' => 'Url',
            'image' => 'Image',
            'weight' => 'Weight',
            'description' => 'Description',
            'price' => 'Price',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDietdayMealDishes()
    {
        return $this->hasMany(DietdayMealDish::className(), ['dish_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishVitamins()
    {
        return $this->hasMany(DishVitamin::className(), ['dish_id' => 'id']);
    }

   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdayMealDishes()
    {
        return $this->hasMany(OrderdayMealDish::className(), ['dish_id' => 'id']);
    }

    public function getVitaminsArray()
    {
        return Vitamin::find()->active()->with(['unit'])->all();
    }
    
    public function getVitaminsArraySelect()
    {
        
        $vitaminsArray = array();
        foreach($this->vitaminsarray as $vitamin)
        {
            $vitaminsArray[$vitamin->id] =  $vitamin->title.' '.$vitamin->unit->title; 
        }

        return $vitaminsArray;
    }
    
    public function getDishVitaminsList()
        {
        $list = array();
        foreach($this->getDishVitamins()->with('vitamin.unit')->all() as $dishVitamin)
            {
            if(!empty($dishVitamin->vitamin_id) && !empty($dishVitamin->value)) $list[] = $dishVitamin->vitamin->title.' - '.$dishVitamin->value.' '.$dishVitamin->vitamin->unit->title;
            }
        return implode('; ',$list);
        }
    
    /**
     * @inheritdoc
     * @return \app\models\query\DishQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DishQuery(get_called_class());
    }
}
