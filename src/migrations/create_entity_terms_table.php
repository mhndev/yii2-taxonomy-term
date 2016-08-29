<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/29/16
 * Time: 4:08 PM
 */
use yii\db\Migration;

/**
 * Handles the creation for table `entity_terms`.
 */
class create_entity_terms_table extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('entity_terms', [
            'id' => $this->primaryKey(),
            'term_id'=>$this->string(),
            'entity'=>$this->string(),
            'entity_id'=>$this->integer(),

            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ]);


        $this->createIndex('index-entity_terms-term_id','terms','term_id');
        $this->addForeignKey('fk-entity_terms-term_id','terms','term_id','terms','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('entity_terms');
    }
}
