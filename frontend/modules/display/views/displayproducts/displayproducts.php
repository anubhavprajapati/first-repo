<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 8/8/18
 * Time: 9:42 AM
 */


use yii\helpers\Html;

/*var_dump($model);
die;*/

/*foreach ($model as $key=>$val)*/


?>
<div>
    <ul type="none">
        <br><br><br><br><br><br>
        <?php foreach ($model as $item => $value) { ?>
            <li>
                <lable>ID:</lable><?= $value['id'] ?>
            </li>
            <li>
                <lable>Name:</lable><?= $value['username'] ?>
            </li>
            <li>
                <lable>image:</lable></h3><img src="/yii1/images/<?= $value['image'] ?>">
            </li>

        <?php } ?>
    </ul>
</div>