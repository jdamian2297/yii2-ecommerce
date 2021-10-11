<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_addressess}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m211011_022154_create_users_addressess_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_addressess}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'address' => $this->string(255)->notNull(),
            'city' => $this->string(255)->notNull(),
            'state' => $this->string(255)->notNUll(),
            'country' => $this->string(255)->notNull(),
            'zipcode' => $this->string(255),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-users_addressess-user_id}}',
            '{{%users_addressess}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-users_addressess-user_id}}',
            '{{%users_addressess}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-users_addressess-user_id}}',
            '{{%users_addressess}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-users_addressess-user_id}}',
            '{{%users_addressess}}'
        );

        $this->dropTable('{{%users_addressess}}');
    }
}
