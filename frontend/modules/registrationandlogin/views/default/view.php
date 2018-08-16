<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 8/8/18
 * Time: 1:04 PM
 */

use frontend\component\TableWidget_2;


?>
<?= TableWidget_2::widget([
                'column'=> [

                    ['index'=>'username',
                        'lable'=>'Name'],
                    ['index'=>'email',
                        'lable'=>'Email-id'],

                ],
                'tabledata'=>$model
                ]);
 ?>
