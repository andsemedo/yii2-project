<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trip}}`.
 */
class m231006_000122_create_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trip', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'from' => $this->integer()->unsigned()->notNull(),
            'to' => $this->integer()->unsigned()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'number_seats' => $this->integer(4)->notNull(),
            'duration' => $this->decimal(10, 1)->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'currency_id' => $this->integer()->unsigned()->notNull(),
            'status' => $this->integer(4)->notNull()->defaultValue(1),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createIndex('idx_user_id_user', 'trip', 'user_id');
        $this->addForeignKey('fk_user_id_user', 'trip', 'user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_from_place', 'trip', 'from');
        $this->addForeignKey('fk_from_place', 'trip', 'from', 'place', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_to_place', 'trip', 'to');
        $this->addForeignKey('fk_to_place', 'trip', 'to', 'place', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_currency_id_currency', 'trip', 'currency_id');
        $this->addForeignKey('fk_currency_id_currency', 'trip', 'currency_id', 'currency', 'id', 'restrict', 'cascade');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_id_user', 'trip');
        $this->dropIndex('idx_user_id_user', 'trip');

        $this->dropForeignKey('fk_from_place', 'trip');
        $this->dropIndex('idx_from_place', 'trip');

        $this->dropForeignKey('fk_to_place', 'trip');
        $this->dropIndex('idx_to_place', 'trip');

        $this->dropForeignKey('fk_currency_id_currency', 'trip');
        $this->dropIndex('idx_currency_id_currency', 'trip');

        $this->dropTable('trip');
    }
}
