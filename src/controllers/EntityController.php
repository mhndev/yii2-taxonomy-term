<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/30/16
 * Time: 5:00 PM
 */
namespace mhndev\yii2TaxonomyTerm\controllers;

use mhndev\yii2TaxonomyTerm\models\EntityTerm;
use yii\rest\ActiveController;

/**
 * Class EntityController
 * @package mhndev\yii2TaxonomyTerm\controllers
 */
class EntityController extends ActiveController
{

    /**
     * @var string
     */
    public $modelClass = EntityTerm::class;

    /**
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

}
