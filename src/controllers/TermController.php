<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/30/16
 * Time: 4:55 PM
 */
namespace mhndev\yii2TaxonomyTerm\controllers;

use mhndev\yii2TaxonomyTerm\models\Term;
use yii\rest\ActiveController;

/**
 * Class TermController
 * @package mhndev\yii2TaxonomyTerm\controllers
 */
class TermController extends ActiveController
{

    /**
     * @var string
     */
    public $modelClass = Term::class;

    /**
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

}
