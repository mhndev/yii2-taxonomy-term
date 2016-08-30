<?php

use yii\db\Migration;

/**
 * Handles the creation for table `taxonomies`.
 */
class m160830_094140_create_taxonomies_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('taxonomies', [
            'id' => $this->primaryKey(),
            'type'=>$this->string(),
            'name'=>$this->string(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('taxonomies');
    }
}
