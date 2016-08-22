<?php

use yii\db\Migration;

/**
 * Handles dropping id_column from table `dish_vitamin_table`.
 */
class m160821_100122_drop_id_column_from_dish_vitamin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('{{%dish_vitamin}}');
        $this->createTable('{{%dish_vitamin}}', [
            
            'dish_id' => $this->integer()->notNull(),
            'vitamin_id' => $this->integer(),
            'value' => $this->float()->defaultValue(0)
            
        ]);
        $this->addPrimaryKey('pk-dish_vitamin', '{{%dish_vitamin}}', ['dish_id', 'vitamin_id']);
        $this->addForeignKey('fk-dish_vitamin-dish', '{{%dish_vitamin}}', 'dish_id', '{{%dish}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-dish_vitamin-vitamin', '{{%dish_vitamin}}', 'vitamin_id', '{{%vitamin}}', 'id', 'CASCADE', 'RESTRICT');
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%dish_vitamin}}');
        $this->createTable('{{%dish_vitamin}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
            'vitamin_id' => $this->integer(),
            'value' => $this->float()->defaultValue(0)
            
        ]);
        $this->addForeignKey('fk-dish_vitamin-dish', '{{%dish_vitamin}}', 'dish_id', '{{%dish}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-dish_vitamin-vitamin', '{{%dish_vitamin}}', 'vitamin_id', '{{%vitamin}}', 'id', 'CASCADE', 'RESTRICT');
        
        
    }
}
