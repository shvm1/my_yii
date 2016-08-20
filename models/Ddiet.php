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
class Diet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prv_diets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'kal'], 'required'],
            [['kal', 'status_del', 'u_create', 'u_update', 'v_update', 'v_create'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'title' => 'Название',
            'kal' => 'Калорийность',
            'status_del' => 'Статус',
            'u_create' => 'Создал',
            'u_update' => 'Обновил',
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
                $this->u_create = Yii::$app->user->getId();
                }
            else 
                {
                $this->u_update = Yii::$app->user->getId();
                $this->v_update = time();
                }
            return true;
            }
        return false;
    }
    
    public function my_delete()
        {
        $this->status_del = 1;
        $this->save();
        
        }
}
