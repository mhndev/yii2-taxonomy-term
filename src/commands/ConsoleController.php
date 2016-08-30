<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/29/16
 * Time: 5:52 PM
 */
namespace mhndev\yii2TaxonomyTerm\commands;
use yii\console\Controller;


/**
 * Class ConsoleController
 * @package mhndev\yii2TaxonomyTerm\Commands
 */
class ConsoleController extends Controller
{

    public function actionMigrate()
    {
        $db = \Yii::$app->db;

        die('message');
    }



}
