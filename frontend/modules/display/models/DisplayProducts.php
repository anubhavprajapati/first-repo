<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 8/8/18
 * Time: 9:41 AM
 */
namespace frontend\modules\display\models;

use Yii;
use yii\db\ActiveRecord;

class DisplayProducts extends ActiveRecord{

    public static function getDb()
    {
        return Yii::$app->db; // TODO: Change the autogenerated stub
    }

    public static function tableName()
    {
        return '{{%form}}';
    }


}