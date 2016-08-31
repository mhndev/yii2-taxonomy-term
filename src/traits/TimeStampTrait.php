<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/31/16
 * Time: 12:59 PM
 */
namespace mhndev\yii2TaxonomyTerm\traits;

use mhndev\yii2TaxonomyTerm\exceptions\InvalidTraitUseException;
use yii\db\ActiveRecord;

/**
 * Class TimeStampTrait
 *
 * consider this trait just can be used on class which extend yii\db\ActiveRecord class
 * @package mhndev\yii2TaxonomyTerm\traits
 */
trait TimeStampTrait
{

    /**
     * @param bool $insert
     * @return bool
     * @throws InvalidTraitUseException
     */
    public function beforeSave($insert)
    {
        if(!is_subclass_of($this, ActiveRecord::class)){
            throw new InvalidTraitUseException;
        }


        if (parent::beforeSave($insert)) {
            if($insert)
                $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            return true;
        } else {
            return false;
        }
    }


}
