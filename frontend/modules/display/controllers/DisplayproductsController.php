<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 8/8/18
 * Time: 9:41 AM
 */

namespace frontend\modules\display\controllers;

use yii\base\Controller;
use frontend\modules\display\models\DisplayProducts;

class DisplayproductsController extends Controller{

    /**
     * @return string
     */
    public function actionDisplayproducts(){

        $model=DisplayProducts::find()->All();
        return $this->render('displayproducts',['model'=>$model]);

    }

    public function actionIndex(){

        return $this->render('index');
    }

}