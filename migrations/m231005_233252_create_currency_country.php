<?php

use yii\db\Migration;

/**
 * Class m231005_233252_create_currency_country
 */
class m231005_233252_create_currency_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey()->unsigned(),
            'code' => $this->string(3)->notNull(),
            'sign_format' => $this->string(45)->notNull()
        ]);

        $this->batchInsert('currency', ['code', 'sign_format'], [
            ['AUD' , 'A$ [price]'],
            ['BGN' , '[price] лв.'],
            ['BRL' , 'R$ [price]'],
            ['CAD' , 'C$ [price]'],
            ['CHF' , '[price] CHF'],
            ['CZK' , 'Kč [price]'],
            ['DKK' , 'dkr [price]'],
            ['EUR' , '€ [price]'],
            ['GBP' , '£ [price]'],
            ['HRK' , '[price] kn'],
            ['HUF' , 'Ft [price]'],
            ['JPY' , '¥ [price]'],
            ['KRW' , '₩ [price]'],
            ['NOK' , 'nkr [price]'],
            ['PLN' , '[price] zł'],
            ['RUB' , '[price] руб'],
            ['SEK' , 'skr [price]'],
            ['TRY' , '[price] TL'],
            ['USD' , '$ [price]'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('currency');

        $this->dropTable('currency');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231005_233252_create_currency_country cannot be reverted.\n";

        return false;
    }
    */
}
