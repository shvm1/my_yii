<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_right}}".
 *
 * @property integer $user_id
 * @property integer $usergroup_id
 * @property integer $right_id
 *
 * @property Right $right
 * @property User $user
 * @property Usergroup $usergroup
 */
class UserRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_right}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'usergroup_id', 'right_id'], 'integer'],
            [['right_id'], 'required'],
            [['right_id'], 'exist', 'skipOnError' => true, 'targetClass' => Right::className(), 'targetAttribute' => ['right_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['usergroup_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usergroup::className(), 'targetAttribute' => ['usergroup_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'usergroup_id' => 'Usergroup ID',
            'right_id' => 'Right ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRight()
    {
        return $this->hasOne(Right::className(), ['id' => 'right_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsergroup()
    {
        return $this->hasOne(Usergroup::className(), ['id' => 'usergroup_id']);
    }
}
