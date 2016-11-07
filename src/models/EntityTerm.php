<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/29/16
 * Time: 4:52 PM
 */
namespace mhndev\yii2TaxonomyTerm\models;

use yii\behaviors\SluggableBehavior;
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
			[['entity'], 'required'],
			[['entity_id'], 'required'],
			[['term_id'], 'required'],
			[['entity', 'entity_id', 'term_id'], 'unique', 'targetAttribute' => ['entity', 'entity_id', 'term_id']],
		];
  }

  /**
   * @param bool $insert
   * @return bool
   */
  public function beforeSave($insert)
  {
		if (parent::beforeSave($insert)) {
		    if($insert)
		        $this->created_at = date('Y-m-d H:i:s');
		    $this->updated_at = date('Y-m-d H:i:s');
		    return true;
		} else {
		    return false;
		}
  }

  public function afterSave($insert, $changedAttributes)
  {
    // Increase Term usage Counter;
    return  Term::findOne($this->term_id)->updateCounters(['usage_count' => 1]);
  }

  public function afterDelete()
  {
    parent::afterDelete();

    // Decrease Term usage Counter
    return  Term::findOne($this->term_id)->updateCounters(['usage_count' => -1]);
  }




}
