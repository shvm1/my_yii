<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%paystatus}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status_del
 */
class Paystatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%paystatus}}';
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
     * @inheritdoc
     * @return PaystatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaystatusQuery(get_called_class());
    }
}
