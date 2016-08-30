<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/30/16
 * Time: 2:18 PM
 */
namespace mhndev\yii2TaxonomyTerm\controllers;

use mhndev\yii2TaxonomyTerm\models\Taxonomy;
use yii\rest\ActiveController;

/**
 * Class TaxonomyController
 * @package mhndev\yii2TaxonomyTerm\controllers
 */
class TaxonomyController extends ActiveController
{

    /**
     * @var string
     */
    public $modelClass = Taxonomy::class;

    /**
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

}
