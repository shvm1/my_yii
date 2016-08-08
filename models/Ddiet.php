<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prv_default_diets".
 *
 * @property integer $dd_id
 * @property string $dd_title
 * @property integer $dd_kal
 * @property integer $dd_status_del
 * @property integer $u_create
 * @property integer $u_update
 * @property integer $v_update
 * @property integer $v_create
 */
class Ddiet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prv_default_diets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dd_title', 'dd_kal'], 'required'],
            [['dd_kal', 'dd_status_del', 'u_create', 'u_update', 'v_update', 'v_create'], 'integer'],
            [['dd_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dd_id' => '№',
            'dd_title' => 'Название',
            'dd_kal' => 'Калорийность',
            'dd_status_del' => 'Статус',
            'u_create' => 'Создал',
            'u_update' => 'Обновил',
            'v_update' => 'Обновлено',
            'v_create' => 'Создано',
        ];
    }
}
