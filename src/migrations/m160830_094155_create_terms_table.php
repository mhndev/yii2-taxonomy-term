<?php

use yii\db\Migration;

/**
 * Handles the creation for table `terms`.
 */
class m160830_094155_create_terms_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('terms', [
            'id' => $this->primaryKey(),
            'taxonomy_id'=>$this->integer(),
            'parent_id'=>$this->integer(),

            'name'=>$this->string(),

            'slug'=>$this->string(),

            'usage_count'=>$this->integer(),
            
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ]);

        $this->createIndex('index-terms-taxonomy_id','terms','taxonomy_id');
        $this->addForeignKey('fk-terms-taxonomy_id','terms','taxonomy_id','taxonomies','id');


        $this->createIndex('index-terms-parent_id','terms','parent_id');
        $this->addForeignKey('fk-terms-parent_id','terms','parent_id','terms','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('terms');
    }
}
