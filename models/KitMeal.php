<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kit_meal}}".
 *
 * @property integer $kit_id
 * @property integer $meal_id
 *
 * @property Meal $meal
 * @property Kit $kit
 */
class KitMeal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%kit_meal}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kit_id', 'meal_id'], 'required'],
            [['kit_id', 'meal_id'], 'integer'],
            [['meal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meal::className(), 'targetAttribute' => ['meal_id' => 'id']],
            [['kit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kit::className(), 'targetAttribute' => ['kit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kit_id' => 'Kit ID',
            'meal_id' => 'Meal ID',
        ];
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
    public function getKit()
    {
        return $this->hasOne(Kit::className(), ['id' => 'kit_id']);
    }
}
