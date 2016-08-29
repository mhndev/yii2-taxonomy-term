<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/29/16
 * Time: 12:57 PM
 */
namespace mhndev\yii2TaxonomyTerm\Entities;

use mhndev\taxonomyTerm\Interfaces\iTaxonomy;
use mhndev\taxonomyTerm\Interfaces\iTerm;
use yii\db\ActiveRecord;

/**
 * Class Taxonomy
 * @package mhndev\yii2TaxonomyTerm\Entities
 */
class Taxonomy extends ActiveRecord implements iTaxonomy
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'taxonomies';

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


    /**
     * @param iTerm $term
     * @return $this
     */
    public function addTerm(iTerm $term)
    {
        /** @var Term $term */
        $term->link('taxonomy', $this);

        return $this;
    }


    /**
     * @param iTerm $term
     * @return $this
     */
    public function removeTerm(iTerm $term)
    {
        /** @var Term $term */
        $term->unlink('taxonomy', $this);

        return $this;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function listTerms()
    {
        return $this->hasMany(Term::class, ['term_id'=>'id']);
    }
}
