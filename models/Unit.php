<?php

namespace app\models;

use Yii;
use app\models\query\UnitQuery;
/**
 * This is the model class for table "{{%unit}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status_del
 *
 * @property Vitamin[] $vitamins
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%unit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status_del'], 'integer'],
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
    public function getVitamins()
    {
        return $this->hasMany(Vitamin::className(), ['unit_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UnitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UnitQuery(get_called_class());
    }
}
