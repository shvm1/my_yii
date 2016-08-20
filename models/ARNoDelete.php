<?php

namespace app\models;

use Yii;

/**
* @inheritdoc
*/
class ARNoDelete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function delete()
    {
        $this->status_del = 1;
        return $this->save();
        
    }

   
}
