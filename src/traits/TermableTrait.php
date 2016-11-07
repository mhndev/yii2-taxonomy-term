<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/31/16
 * Time: 1:16 PM
 */
namespace mhndev\yii2TaxonomyTerm\traits;

use mhndev\taxonomyTerm\Interfaces\iTerm;
use mhndev\yii2TaxonomyTerm\models\EntityTerm;
use mhndev\yii2TaxonomyTerm\models\Term;

/**
 * Class TermableTrait
 * @package mhndev\yii2TaxonomyTerm\traits
 */
trait TermableTrait
{


    /**
     * @return mixed
     */
    public function listTerms()
    {
        return EntityTerm::findAll(['entity'=>static::class, 'entity_id'=>$this->id ]);
    }

    /**
     * @param iTerm $term
     * @return boolean
     */
    public function hasTerm(iTerm $term)
    {
        $result = EntityTerm::findOne(['term_id'=>$term->id, 'entity_id'=>$this->id , 'entity'=>static::class ]);

        return empty($result) ? false : true;
    }


    /**
     * @param iTerm $term
     * @return integer
     */
    public function detachTerm(iTerm $term)
    {
        return EntityTerm::deleteAll(['term_id'=>$term->id, 'entity_id'=>$this->id]);
    }

    /**
     * @param iTerm $term
     * @return EntityTerm
     */
    public function attachTerm(iTerm $term)
    {
        $record = new EntityTerm(['term_id'=>$term->id, 'entity_id'=>$this->id, 'entity'=>static::class]);
        $record->save();

        return $record;
    }

}
