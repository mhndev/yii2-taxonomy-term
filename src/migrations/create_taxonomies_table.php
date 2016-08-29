<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/29/16
 * Time: 3:58 PM
 */
use yii\db\Migration;

/**
 * Handles the creation for table `taxonomies`.
 */
class create_taxonomies_table extends Migration
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
