<?php

use yii\db\Migration;

class m160813_112359_create_empty_table extends Migration
{
    public function up()
    {
        

        $this->createTable('{{%kit}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);

        $this->createTable('{{%meal}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->createTable('{{%unit}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->createTable('{{%paymethod}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->createTable('{{%paystatus}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
       
        
        
        
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->decimal(10, 2)->defaultValue(0),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->createTable('{{%shipment}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->decimal(10, 2)->defaultValue(0),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
         $this->createTable('{{%deliverytime}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'color' => $this->string(30)->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
         
        $this->createTable('{{%dish}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'kal' => $this->integer()->defaultValue(0),
            'protein' => $this->float()->defaultValue(0),
            'fat' => $this->float()->defaultValue(0),
            'carbohydrate' => $this->float()->defaultValue(0),
            'url' => $this->string(255),
            'image' => $this->string(255),
            'weight' => $this->integer()->defaultValue(0),
            'description' => $this->string(),
            'price' => $this->decimal(10, 2)->defaultValue(0),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
    }

    public function down()
    {
        
        $this->dropTable('{{%kit}}');
        $this->dropTable('{{%meal}}');
        $this->dropTable('{{%unit}}');
        $this->dropTable('{{%paymethod}}');
        $this->dropTable('{{%paystatus}}');
        $this->dropTable('{{%service}}');
        $this->dropTable('{{%shipment}}');
        $this->dropTable('{{%deliverytime}}');
        $this->dropTable('{{%dish}}');
    }
}
