<?php

namespace frontend\modules\registrationandlogin\controllers;

use frontend\modules\registrationandlogin\models\Registration;
use yii\web\Controller;

/**
 * Default controller for the `modules` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView(){

        $model=Registration::find()->All();
        return $this->render('view',['model'=>$model]);
    }
}
