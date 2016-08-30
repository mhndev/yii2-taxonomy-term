<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/29/16
 * Time: 12:57 PM
 */
namespace mhndev\yii2TaxonomyTerm\models;

use mhndev\taxonomyTerm\Interfaces\iTaxonomy;
use mhndev\taxonomyTerm\Interfaces\iTerm;
use mhndev\yii2TaxonomyTerm\Exceptions\ObjectMustBeInstanceOfActiveRecordException;
use yii\db\ActiveRecord;

/**
 * Class Term
 * @package mhndev\yii2TaxonomyTerm\Entities
 */
class Term extends ActiveRecord implements iTerm
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'terms';

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
     * @return \yii\db\ActiveQuery
     */
    public function getTaxonomy()
    {
        return $this->hasOne(Taxonomy::class, ['taxonomy_id'=>'id']);
    }

    /**
     * @param iTaxonomy $taxonomy
     * @return $this
     */
    public function setTaxonomy(iTaxonomy $taxonomy)
    {
        /** @var Taxonomy $taxonomy */
        $this->link('taxonomy', $taxonomy);

        return $this;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(self::class, ['parent_id'=>'id']);
    }


    /**
     * @param iTerm $parent
     * @return $this
     */
    public function setParent(iTerm $parent)
    {
        /** @var Term $parent */
        $this->link('parent', $parent);

        return $this;
    }

    /**
     * @return $this
     */
    public function removeChildren()
    {
        Term::deleteAll(['parent_id'=> $this->id]);

        return $this;
    }

    /**
     * @param iTerm $term
     * @return $this
     */
    public function removeChild(iTerm $term)
    {
        /** @var Term $term */
        $term->unlink('parent', $this);

        return $this;
    }

    /**
     * @param iTerm $term
     * @return $this
     */
    public function addChild(iTerm $term)
    {
        /** @var Term $term */
        $term->link('parent', $this);

        return $this;
    }

    /**
     * @param array $children array of iTerm
     * @return $this
     * @throws ObjectMustBeInstanceOfActiveRecordException
     */
    public function setChildren(array $children)
    {
        foreach ($children as $child){
            if(! $child instanceof ActiveRecord){
                throw new ObjectMustBeInstanceOfActiveRecordException;
            }

            /** @var Term $child */
            $child->link('parent', $this);
        }

        return $this;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(self::class, ['parent_id'=>'id']);
    }

    /**
     * GetUsedCount
     *
     * This function returns usage number of this term
     *
     * @return integer
     */
    public function getUsedCount()
    {
        return $this->usage_count;
    }

    /**
     * GetUsedEntities
     *
     * This function returns Entities which has used this term
     *
     * @return array
     */
    public function getUsedEntities()
    {
        return $this->hasMany(EntityTerm::class, ['entity_id'=>'id']);
    }


}
