<?php

use yii\db\Migration;

class m160813_114613_create_diet_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%diet}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'kal' => $this->integer()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false),
            'create_time' => $this->integer(),
            'update_time' => $this->integer()->defaultValue(0),
            'create_user_id' => $this->integer(),
            'update_user_id' => $this->integer()->defaultValue(0)
        ]);
        
        $this->createTable('{{%dietday}}', [
            'id' => $this->primaryKey(),
            'diet_id' => $this->integer()->notNull(),
            'num' => $this->integer()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
            
        ]);
        
        $this->addForeignKey('fk-dietday-diet', '{{%dietday}}', 'diet_id', '{{%diet}}', 'id', 'CASCADE', 'RESTRICT');
        
        $this->createTable('{{%kit_meal}}', [
            'kit_id' => $this->integer()->notNull(),
            'meal_id' => $this->integer()->notNull()
            
        ]);
        
        $this->addPrimaryKey('pk-kit_meal', '{{%kit_meal}}', ['kit_id', 'meal_id']);

        $this->addForeignKey('fk-kit_meal-kit', '{{%kit_meal}}', 'kit_id', '{{%kit}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-kit_meal-meal', '{{%kit_meal}}', 'meal_id', '{{%meal}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        $this->createTable('{{%diet_price}}', [
            'diet_id' => $this->integer()->notNull(),
            'kit_id' => $this->integer()->notNull(),
            'price' => $this->decimal(10, 2)->defaultValue(0)
            
        ]);
        
        $this->addPrimaryKey('pk-diet_price', '{{%diet_price}}', ['diet_id', 'kit_id']);
        
        $this->addForeignKey('fk-diet_price-diet', '{{%diet_price}}', 'diet_id', '{{%diet}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-diet_price-kit', '{{%diet_price}}', 'kit_id', '{{%kit}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        $this->createTable('{{%vitamin}}', [
            'id' => $this->primaryKey(),
            'unit_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
            
        ]);
        
        $this->addForeignKey('fk-vitamin-unit', '{{%vitamin}}', 'unit_id', '{{%unit}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        $this->createTable('{{%dish_vitamin}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
            'vitamin_id' => $this->integer()->defaultValue(0),
            'value' => $this->float()->defaultValue(0)
            
        ]);
        
        $this->addForeignKey('fk-dish_vitamin-dish', '{{%dish_vitamin}}', 'dish_id', '{{%dish}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-dish_vitamin-vitamin', '{{%dish_vitamin}}', 'vitamin_id', '{{%vitamin}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        $this->createTable('{{%dietday_meal_dish}}', [
            'id' => $this->primaryKey(),
            'dietday_id' => $this->integer()->notNull(),
            'meal_id' => $this->integer()->notNull(),
            'dish_id' => $this->integer()->defaultValue(0),
            'value' => $this->float()->defaultValue(0)
            
        ]);
        
        $this->addForeignKey('fk-dietday_meal_dish-dietday', '{{%dietday_meal_dish}}', 'dietday_id', '{{%dietday}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-dietday_meal_dish-meal', '{{%dietday_meal_dish}}', 'meal_id', '{{%meal}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-dietday_meal_dish-dish', '{{%dietday_meal_dish}}', 'dish_id', '{{%dish}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        
        
    }

    public function down()
    {
        $this->dropTable('{{%dietday_meal_dish}}');
        $this->dropTable('{{%dish_vitamin}}');
        $this->dropTable('{{%vitamin}}');
        $this->dropTable('{{%diet_price}}');
        $this->dropTable('{{%kit_meal}}');
        $this->dropTable('{{%dietday}}');
        $this->dropTable('{{%diet}}');
        
        
        
        
        
        
        
    }
}
