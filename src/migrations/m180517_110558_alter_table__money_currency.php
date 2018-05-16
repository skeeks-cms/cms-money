<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.04.2015
 */

use yii\db\Schema;
use yii\db\Migration;

class m180517_110558_alter_table__money_currency extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%money_currency}}', 'is_active', $this->integer(1)->notNull()->defaultValue(0));
        $this->createIndex("is_active", "{{%money_currency}}", ['is_active']);

        $this->alterColumn('{{%money_currency}}', 'priority', $this->integer()->notNull()->defaultValue(100));

        $this->update('{{%money_currency}}', ['is_active' => 1], ['active' => 'Y']);
        $this->update('{{%money_currency}}', ['priority' => 100], ['priority' => 0]);

        $this->dropColumn('{{%money_currency}}', 'name_full');
        $this->dropColumn('{{%money_currency}}', 'active');

        $this->addColumn('{{%money_currency}}', 'is_active', $this->integer(1)->notNull()->defaultValue(0));

        return true;
    }

    public function down()
    {
        echo "m150902_110558_alter_table__money_currency cannot be reverted.\n";
        return false;
    }
}
