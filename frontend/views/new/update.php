<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 28/7/18
 * Time: 2:25 PM
 */
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 26/7/18
 * Time: 2:05 PM
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use kartik\file\FileInput;

$this->title = 'Registration Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-lg-5">
            <h3>Update Registration Form</h3>

            <?php $form = ActiveForm::begin(['action'=>['/new/update?id='.$model->id],'options'=>['id'=>'Addpost','enctype'=>'multipart/form-data']]); ?>
            <?= $form->field($model, 'username')?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'phone') ?>
            <b><?= 'Image'?></b>
            <input type="hidden" value="<?= $model->image?>" name="image2"/>

            <div><?= Html::img(["/images/".$model->image],['alt'=>$model->image])?></div>
            <?= $form->field($model,'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
            ]);?>
            <?= $form->field($model, 'password')->passwordInput()?>
            <?= $form->field($model, 'dob')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '1980-01-01'],'dateFormat' => 'yyyy-MM-dd'])?>

            <div class="form-group">
                <?= Html::submitButton('Update',['class'=>'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>