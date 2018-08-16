<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 6/8/18
 * Time: 8:14 PM
 */

namespace frontend\controllers;

use frontend\models\DbNew;
use frontend\models\TaskForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\component\CustomRender;

/**
 * Ren controller
 */
class RenController extends CustomRender
{

    public function actionAbout()
    {
        $model1=new TaskForm();
        $model2=new DbNew();
        //$a=array();
        $this->layout='threecolumn';
        return $this->render(['left'],['content',['model2'=>$model1]],['right',['model2'=>$model1]]);
    }

}
/*return $this->render(['left'],['content',['model2'=>$model1]],['right',['model2'=>$model1]]);*/
