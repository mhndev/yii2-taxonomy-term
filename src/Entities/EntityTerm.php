<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/29/16
 * Time: 4:52 PM
 */
namespace mhndev\yii2TaxonomyTerm\Entities;

use yii\db\ActiveRecord;

/**
 * Class EntityTerm
 * @package mhndev\yii2TaxonomyTerm\Entities
 */
class EntityTerm extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'entity_terms';

    }

    /**
     * @return array
     */
    public function rules()
    {
        return [

            [['name'], 'required'],

        ];
    }

}
