<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diet".
 *
 * @property integer $d_id
 * @property string $d_title
 * @property integer $d_kal
 * @property integer $v_update
 * @property integer $v_create
 */
class Diet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return PRX.'diet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d_title', 'd_kal'], 'required'],
            [['d_kal', 'v_update'], 'integer'],
            [['d_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'd_id' => 'ID',
            'd_title' => 'Название',
            'd_kal' => 'Калорийность',
            'v_update' => 'Обновлено',
            'v_create' => 'Создано',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        if(parent::beforeSave($insert))
        {
        if($insert)
            { 
            $this->v_create = time();
            $this->v_update = 0;
            }
        else 
            {
            
            $this->v_update = time();
            }
        return true;
        }
        return false;
    }
}
