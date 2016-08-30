<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/30/16
 * Time: 1:59 PM
 */
namespace mhndev\yii2TaxonomyTerm;

use yii\base\BootstrapInterface;
use yii\base\Module as BaseModule;
use yii\console\Application as ConsoleApplication;

/**
 * Class Module
 * @package mhndev\yii2TaxonomyTerm
 */
class Module extends BaseModule implements BootstrapInterface
{

    public $db = 'db';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'mhndev\yii2TaxonomyTerm\controllers';


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

    }
    public function bootstrap($app)
    {
        if ($app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'mhndev\yii2TaxonomyTerm\commands';
        }
    }
}
