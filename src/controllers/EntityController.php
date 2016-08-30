<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/30/16
 * Time: 5:00 PM
 */
namespace mhndev\yii2TaxonomyTerm\controllers;

use yii\web\Controller;

/**
 * Class EntityController
 * @package mhndev\yii2TaxonomyTerm\controllers
 */
class EntityController extends Controller
{

    public function actionAttach()
    {
        $data = \Yii::$app->request->get();

        var_dump($data);
        die();

    }


    public function actionDetach()
    {

    }
}
