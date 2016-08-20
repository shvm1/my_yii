<?php

use yii\db\Migration;

class m160813_143146_create_user_tables extends Migration
{
    public function up()
    {
        
         $this->createTable('{{%usergroup}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->createTable('{{%right}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'parent_id' => $this->integer(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->addForeignKey('fk-right-parent', '{{%right}}', 'parent_id', '{{%right}}', 'id', 'SET NULL', 'RESTRICT');
        
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(255),
            'name' => $this->string(255),
            'pass' => $this->string(255),
            'hash' => $this->string(255),
            'phone' => $this->string(255),
            'email' => $this->string(255),
            'usergroup_id' => $this->integer(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->addForeignKey('fk-user-usergroup', '{{%user}}', 'usergroup_id', '{{%usergroup}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        $this->createTable('{{%user_right}}', [
            'user_id' => $this->integer()->defaultValue(0),
            'usergroup_id' => $this->integer()->defaultValue(0),
            'right_id' => $this->integer()->notNull()
        ]);
        
        $this->addForeignKey('fk-user_right-user', '{{%user_right}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user_right-usergroup', '{{%user_right}}', 'usergroup_id', '{{%usergroup}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user_right-right', '{{%user_right}}', 'right_id', '{{%right}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'address' => $this->string(255),
            'user_id' => $this->integer(),
            'status_del' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->addForeignKey('fk-address-user', '{{%address}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        
        
        
        
        
        
    }

    public function down()
    {
         $this->dropTable('{{%address}}');
         $this->dropTable('{{%user_right}}');
         $this->dropTable('{{%user}}');
         $this->dropTable('{{%right}}');
        $this->dropTable('{{%%usergroup}}');
        
        
        
       
    }
}
