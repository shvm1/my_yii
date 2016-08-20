<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%right}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 * @property integer $status_del
 *
 * @property Right $parent
 * @property Right[] $rights
 * @property UserRight[] $userRights
 */
class Right extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%right}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id', 'status_del'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Right::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => 'Parent ID',
            'status_del' => 'Status Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Right::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRights()
    {
        return $this->hasMany(Right::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRights()
    {
        return $this->hasMany(UserRight::className(), ['right_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return RightQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RightQuery(get_called_class());
    }
}
