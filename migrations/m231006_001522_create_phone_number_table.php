<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone_number}}`.
 */
class m231006_001522_create_phone_number_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('phone_number', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'country_id' => $this->integer()->unsigned()->notNull(),
            'number' => $this->string(45)->notNull(),
            'verification_code' => $this->string(45)->notNull(),
            'verified' => $this->boolean()->notNull()->defaultValue(false),
            'active' => $this->boolean()->notNull()->defaultValue(true),
            'create' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createIndex('idx_phone_number_user_id_user', 'phone_number', 'user_id');
        $this->addForeignKey('fk_phone_number_user_id_user', 'phone_number', 'user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_phone_number_country_id_country', 'phone_number', 'country_id');
        $this->addForeignKey('fk_phone_number_country_id_country', 'phone_number', 'country_id', 'country', 'id', 'restrict', 'cascade');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_phone_number_user_id_user', 'phone_number');
        $this->dropIndex('idx_phone_number_user_id_user', 'phone_number');

        $this->dropForeignKey('fk_phone_number_country_id_country', 'phone_number');
        $this->dropIndex('idx_phone_number_country_id_country', 'phone_number');

        $this->dropTable('phone_number');
    }
}
