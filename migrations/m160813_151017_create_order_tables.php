<?php

use yii\db\Migration;

class m160813_151017_create_order_tables extends Migration
{
    public function up()
    {
        
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'diet_id' => $this->integer()->defaultValue(0),
            'kit_id' => $this->integer()->defaultValue(0),
            'shipment_id' => $this->integer()->defaultValue(0),
            'address_id' => $this->integer()->defaultValue(0),
            'deliverytime_id' => $this->integer()->defaultValue(0),
            'discount' => $this->integer()->defaultValue(0),
            'phone' => $this->string(255)->notNull(),
            'email' => $this->string(255)->defaultValue(''),
            'count_person' => $this->integer()->defaultValue(0),
            'pay' => $this->decimal(10, 2)->defaultValue(0),
            'comment' => $this->string(255)->defaultValue(''),
            'status_pay' => $this->smallInteger()->defaultValue(0),
            'status_del' => $this->boolean()->defaultValue(false),
            'create_time' => $this->integer(),
            'update_time' => $this->integer()->defaultValue(0),
            'create_user_id' => $this->integer(),
            'update_user_id' => $this->integer()->defaultValue(0)
        ]);
        
        $this->addForeignKey('fk-order-user', '{{%order}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-order-diet', '{{%order}}', 'diet_id', '{{%diet}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-order-kit', '{{%order}}', 'kit_id', '{{%kit}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-order-shipment', '{{%order}}', 'shipment_id', '{{%shipment}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-order-address', '{{%order}}', 'address_id', '{{%address}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-order-deliverytime', '{{%order}}', 'deliverytime_id', '{{%deliverytime}}', 'id', 'CASCADE', 'RESTRICT');
        
        $this->createTable('{{%orderday}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'order_id' => $this->integer(),
            'diet_id' => $this->integer()->defaultValue(0),
            'kit_id' => $this->integer()->defaultValue(0),
            'shipment_id' => $this->integer()->defaultValue(0),
            'address_id' => $this->integer()->defaultValue(0),
            'deliverytime_id' => $this->integer()->defaultValue(0),
            'num' => $this->integer()->defaultValue(0),
            'dateday' => $this->date(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->addForeignKey('fk-orderday-user', '{{%orderday}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday-order', '{{%orderday}}', 'order_id', '{{%order}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday-diet', '{{%orderday}}', 'diet_id', '{{%diet}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday-kit', '{{%orderday}}', 'kit_id', '{{%kit}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday-shipment', '{{%orderday}}', 'shipment_id', '{{%shipment}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday-address', '{{%orderday}}', 'address_id', '{{%address}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday-deliverytime', '{{%orderday}}', 'deliverytime_id', '{{%deliverytime}}', 'id', 'CASCADE', 'RESTRICT');
        
        
         $this->createTable('{{%orderday_meal_dish}}', [
            'id' => $this->primaryKey(),
            'orderday_id' => $this->integer()->notNull(),
            'meal_id' => $this->integer()->notNull(),
            'dish_id' => $this->integer()->defaultValue(0),
            'value' => $this->float()->defaultValue(0)
            
        ]);
        
        $this->addForeignKey('fk-orderday_meal_dish-orderday', '{{%orderday_meal_dish}}', 'orderday_id', '{{%orderday}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday_meal_dish-meal', '{{%orderday_meal_dish}}', 'meal_id', '{{%meal}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday_meal_dish-dish', '{{%orderday_meal_dish}}', 'dish_id', '{{%dish}}', 'id', 'CASCADE', 'RESTRICT');
        
    
        $this->createTable('{{%orderday_service}}', [
            'id' => $this->primaryKey(),
            'orderday_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->defaultValue(0)
            
        ]);
        
        $this->addForeignKey('fk-orderday_service-orderday', '{{%orderday_service}}', 'orderday_id', '{{%orderday}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-orderday_service-service', '{{%orderday_service}}', 'service_id', '{{%service}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        
        
        
       
    }

    public function down()
    {
        $this->dropTable('{{%orderday_service}}');
        $this->dropTable('{{%orderday_meal_dish}}');
        $this->dropTable('{{%orderday}}');
        $this->dropTable('{{%order}}');
        
        
        
    }
}
