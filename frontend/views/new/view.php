<?php

use frontend\component\TableWidget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\web\UrlManager;
?>
<?= TableWidget::widget([
                'column'=> [

                    ['index'=>'username',
                        'lable'=>'Name'],
                    ['index'=>'email',
                        'lable'=>'Email-id'],
                    ['index'=>'image',
                        'lable'=>'Image'],
                    ['index'=>'phone',
                        'lable'=>'Phone no'],
                    ['index'=>'dob',
                        'lable'=>'DOB'],
                ],
                'tabledata'=>$model
                ]);
 ?>
<?/*= Html::dropDownList('list', '',['csv','xls']) */?><!--<br>-->
<!--<?/*= Html::a('Download CSV file','/yii1/new/download') */?><br>-->
    <?= Html::a(Html::submitButton('Download CSV file',['class' => 'btn btn-default']),'/yii1/new/download') ?>
    <?= Html::a(Html::submitButton('Download XLS file',['class' => 'btn btn-default']),'/yii1/new/downxl') ?>
<?/*= Html::a('Download Xls file','/yii1/new/downxl') */?>
<?= TableWidget::widget([
    'column'=> [

        ['index'=>'username',
            'lable'=>'Name'],
        ['index'=>'email',
            'lable'=>'Email-id'],
        ['index'=>'image',
            'lable'=>'Image'],
        ['index'=>'phone',
            'lable'=>'Phone no'],
        ['index'=>'dob',
            'lable'=>'DOB'],
    ],
    'tabledata'=>$model2
]);

?>
<div class="form-group">
   <!-- --><?/*= Html::submitButton(Html::a('Refresh', '/yii1/new/refresh'),['class' => 'btn btn-default']) */?>
    <!--<br><?/*= Html::a('Download CSV file','/yii1/new/download2') */?>
    <br>--><?/*= Html::a('Download Xls file','/yii1/new/downxl2') */?>
    <?= Html::a(Html::submitButton('Download CSV file',['class' => 'btn btn-default']),'/yii1/new/download2') ?>
    <?= Html::a(Html::submitButton('Download XLS file',['class' => 'btn btn-default']),'/yii1/new/downxl2') ?>
   <br><br> <?= Html::a(Html::submitButton('Refresh',['class' => 'btn btn-primary']),'/yii1/new/refresh') ?>

</div>
