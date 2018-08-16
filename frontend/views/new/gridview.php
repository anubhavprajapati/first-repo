<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 2/8/18
 * Time: 9:55 AM
 */


use yii\grid\GridView;
use yii\data\ActiveDataProvider;

?>
<?= $dataprovider=new ActiveDataProvider([
    'query'=>\frontend\models\TaskForm::find(),
    'pagination'=>[
        'pageSize'=>20
    ],
]);
print_r($dataprovider);die;
echo GridView::widget([

                'dataProvider'=>$dataprovider,
                ]);
 ?>
<!--
'column'=> [
['index'=>'username',
'lable'=>'Name'],
['index'=>'email',
'lable'=>'Email-id'],
['index'=>'image',
'lable'=>'Image Name'],
['index'=>'phone',
'lable'=>'Phone no'],
['index'=>'dob',
'lable'=>'DOB']
],-->
