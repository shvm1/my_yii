<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%dish_vitamin}}".
 *
 * @property integer $id
 * @property integer $dish_id
 * @property integer $vitamin_id
 * @property double $value
 *
 * @property Vitamin $vitamin
 * @property Dish $dish
 */
class DishVitamin extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dish_vitamin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['dish_id', 'vitamin_id'], 'integer'],
            [['value'], 'number'],
            [['vitamin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vitamin::className(), 'targetAttribute' => ['vitamin_id' => 'id']],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['dish_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'vitamin_id' => 'Vitamin ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVitamin()
    {
        return $this->hasOne(Vitamin::className(), ['id' => 'vitamin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dish::className(), ['id' => 'dish_id']);
    }
    
    public function getName()
    {
        return $this->title.' '.$this->vitamin->unit->title;
    }
}
