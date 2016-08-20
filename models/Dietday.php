<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%dietday}}".
 *
 * @property integer $id
 * @property integer $diet_id
 * @property integer $num
 * @property integer $status_del
 *
 * @property Diet $diet
 * @property DietdayMealDish[] $dietdayMealDishes
 */
class Dietday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dietday}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diet_id', 'num'], 'required'],
            [['diet_id', 'num', 'status_del'], 'integer'],
            [['diet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diet::className(), 'targetAttribute' => ['diet_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diet_id' => 'Diet ID',
            'num' => 'Num',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiet()
    {
        return $this->hasOne(Diet::className(), ['id' => 'diet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDietdayMealDishes()
    {
        return $this->hasMany(DietdayMealDish::className(), ['dietday_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\DietdayQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DietdayQuery(get_called_class());
    }
}
