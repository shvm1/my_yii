<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%usergroup}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status_del
 *
 * @property User[] $users
 * @property UserRight[] $userRights
 */
class Usergroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usergroup}}';
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
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['usergroup_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRights()
    {
        return $this->hasMany(UserRight::className(), ['usergroup_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\UsergroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\UsergroupQuery(get_called_class());
    }
}
