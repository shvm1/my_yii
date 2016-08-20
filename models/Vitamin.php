<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%vitamin}}".
 *
 * @property integer $id
 * @property integer $unit_id
 * @property string $title
 * @property integer $status_del
 *
 * @property DishVitamin[] $dishVitamins
 * @property Unit $unit
 */
class Vitamin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vitamin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_id', 'title'], 'required'],
            [['unit_id', 'status_del'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit_id' => 'Unit',
            'title' => 'Title',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishVitamins()
    {
        return $this->hasMany(DishVitamin::className(), ['vitamin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\VitaminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\VitaminQuery(get_called_class());
    }
}
