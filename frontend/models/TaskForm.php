<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 28/7/18
 * Time: 2:28 PM
 */

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Event;
use yii\base\Component;

class TaskForm extends ActiveRecord
{
/*    const FORM_FILLED='Success MSg';*/

    public static function getDb()
    {
        return Yii::$app->db; // TODO: Change the autogenerated stub
    }

    /**
     * @return string table name from database yii2advanced
     */
    public static function tableName()
    {
        return '{{%form}}'; // TODO: Change the autogenerated stub
    }

    /**
     * @return array
     */

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'message' => 'This email address has already been taken.'],

            ['phone','number'],
            ['phone','required'],
            ['phone','string','min'=>10,'max'=>10],


            ['image','file','skipOnEmpty' => true, 'extensions' => 'png, jpg ,jpeg', 'message'=>'{extensions} files only', 'on'=>'update'],
          /*  ['image','image'],*/

            ['password', 'required'],
            ['password', 'string','min'=>8],
            ['password', 'match','pattern' => '/^((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'message'=>'Password must contain atleast 1 capital letter, 1 number and 1 special character.'],


            ['dob','required'],
            ['dob','string'],
            //['username,dob,image,password,email,phone', 'safe']



        ];
    }

    /*public function init(){

        $this->on(self::FORM_FILLED, [$this, 'sendMail']);
    }

 //   const FORM_FILLED="";
    const Notification="ghff";
    public function sendMail(){
        echo '<script>alert("Mail has been sent on ur mail-id.");</script>';

    }*/

    public function scenarios()
    {
        $scenario= parent::scenarios(); // TODO: Change the autogenerated stub
        $scenario['login']=['username','password'];
        return $scenario;
    }


}