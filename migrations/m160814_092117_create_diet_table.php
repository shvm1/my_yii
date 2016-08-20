<?php

use yii\db\Migration;

/**
 * Handles the creation for table `{{%diet_table}}`.
 */
class m160814_092117_create_diet_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%diet}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'kal' => $this->integer()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%diet}}');
    }
}
