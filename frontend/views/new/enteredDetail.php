<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 26/7/18
 * Time: 2:05 PM
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Lorem ipsum';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <p>You have entered the following information in form:</p>


    <div class="row">
        <div class="col-lg-5">

            <ul>
                <li><label>Name</label>: <?= $model->username ?></li>
                <li><label>Email</label>: <?= $model->email ?></li>
                <li><label>Phone</label>: <?= $model->phone ?></li>
                <li><label>DOB</label>: <?= $model->dob ?> </li>
                <li><label>Image</label>: <?= $model->image ?></li>
            </ul>

           <!-- <div class="form-group">
                <?/*= Html::submitButton('EDIT', ['class' => 'btn btn-primary','id'=>$model->id]) */?>
            </div>
-->
        </div>

    </div>
</div>

