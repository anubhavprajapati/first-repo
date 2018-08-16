<?php

namespace frontend\controllers;

use frontend\models\DbNew;
use http\Url;
use Yii;
use frontend\models\TaskForm;
//use frontend\models\DbNew;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\UrlManager;
use yii2tech\csvgrid\CsvGrid;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use PhpOffice\PhpSpreadsheet;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class NewController extends Controller
{

    public $enableCsrfValidation = false;
    public $model;

    /**
     * this function takes the updated data and send it to 'Updatedata' function using curl
     * @param $id of data whose value is to be updated
     *
     */
    public function actionUpdate($id)
    {
        try {
            $model = new TaskForm();
            $image2=$_POST['image2'];
            if (Yii::$app->request->isPost) {
                $data = Yii::$app->request->post();
                    $image = UploadedFile::getInstance($model, 'image');

                if($image!='') {
                    $image->saveAs(Yii::getAlias('@ImgPath' . '/' . $image));
                    $model->image = $image;
                    $data['TaskForm']['image'] = $image->name;
                }
                else{
                    $data['TaskForm']['image'] = $image2;

                }
                $url = 'http://192.168.0.173/yii1/new/updatedata';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                curl_setopt($ch, CURLOPT_POST, true);/*
                print_r(CURLOPT_HEADER);die("sdfsdf");*/
             /*   if(!empty(CURLOPT_HEADER)){
                curl_setopt($ch,CURLOPT_HEADER,true);
                }*/
                $sentdata = array(
                    'id' => $id,
                    'username' => $data['TaskForm']['username'],
                    'email' => $data['TaskForm']['email'],
                    'image' => $data['TaskForm']['image'],
                    'phone' => $data['TaskForm']['phone'],
                    'dob' => $data['TaskForm']['dob'],
                    'password' => $data['TaskForm']['password']
                );



                curl_setopt($ch, CURLOPT_POSTFIELDS, $sentdata);
                //    $useldata=urlencode($data['TaskForm']['username']);
                //   var_dump($useldata);die;
                curl_exec($ch);
                curl_close($ch);
            }
        }
        catch (\Exception $exception){
            /*return $this->render('update', [
                'count' => 'Error',
            ]);*/
        }


    }


    /** performes update data in database of given $id from update function using raw queries
     * @return string to view page
     * @throws \yii\db\Exception
     */
    public function actionUpdatedata()
    {
        $model=new TaskForm();
        if(Yii::$app->request->isPost) {
            $cache = Yii::$app->cache;
            // var_dump(Yii::$app->request->post());die;
            $val = Yii::$app->request->post();

            $db1 = Yii::$app->db->createCommand("UPDATE form set username='" . $val['username'] . "',email='" . $val['email'] . "',image='" . $val['image'] . "',phone='" . $val['phone'] . "',dob='" . $val['dob'] . "',password='" . $val['password'] . "' Where id='" . $val['id'] . "'")->execute();
            $db2 = Yii::$app->db2->createCommand("UPDATE user set username='" . $val['username'] . "',email='" . $val['email'] . "',image='" . $val['image'] . "',phone='" . $val['phone'] . "',dob='" . $val['dob'] . "',password='" . $val['password'] . "' Where id='" . $val['id'] . "'")->execute();

            $cached_data = $cache->get('form_model_data');
            $cached_data2 = $cache->get('form_model_data2');
            return $this->render('view', ['model' => $cached_data, 'model2' => $cached_data2]);
        }
        return $this->render('form', ['model' => $model]);



    }

    /**
     * this function is active when delete action is performed
     * this function deletes the data from database of give $id using raw queries
     * @param $id
     * @return string
     * @throws \yii\db\Exception
     */

    public function actionDel($id)
    {


        $cache = Yii::$app->cache;
        $db1 = Yii::$app->db->createCommand("DELETE FROM form Where id='$id'")->execute();
        $db2 = Yii::$app->db2->createCommand("DELETE FROM user Where id='$id'")->execute();

        $cached_data = $cache->get('form_model_data');
        $cached_data2 = $cache->get('form_model_data2');
        return $this->render('view', ['model' => $cached_data, 'model2' => $cached_data2]);
    }

    /**
     * this function fetches the data of cache and set it in variable and render it on view page
     * @return string
     */
    public function actionView()
    {
        $cache = Yii::$app->cache;
        /* $model=TaskForm::find()->All();
         $model2=DbNew::find()->All();*/
        //   $model=(new \yii\db\Query())->select('*')->from('user')->All();


        /*  $model = DbNew::getDb()->cache(function ($db) {
              return DbNew::find()->All();
          });*/
        //    $cache->set('form_model_data',$model);
        $cached_data = $cache->get('form_model_data');
        //    var_dump($cached_data);die;
        /*$m=array_merge($model,$model2);*/

        /*$model2 = TaskForm::getDb()->cache(function ($db) {
            return TaskForm::find()->All();
        });*/

        //     $cache->set('form_model_data2',$model2);
        $cached_data2 = $cache->get('form_model_data2');

        return $this->render('view', ['model' => $cached_data, 'model2' => $cached_data2]);
    }

    /**practice function
     * @return string
     * @throws \Throwable
     */
    public function actionGridview()
    {
        $model = DbNew::getDb()->cache(function ($db) {
            return DbNew::find()->All();
        });

        $url = Url::toRoute(['new/view']);

        return $this->render('view', ['model' => $model]);
        /*
                $obj=new TaskForm();
                $a=$obj->username;

                var_dump($result);die;*/


        //  $model=TaskForm::find()->All();
        //   $model=(new \yii\db\Query())->select('*')->from('user')->All();

//        $this->layout = 'view';


    }

    /**
     * this function fetches the fresh data or updated data from database and set/override it in cache and render it on view page
     * @return string
     */

    public function actionRefresh()
    {


        $cache = Yii::$app->cache;
        $model = TaskForm::find()->All();
        $model2 = DbNew::find()->All();


        /*$model = TaskForm::getDb()->cache(function ($db) {
            return TaskForm::find()->All();
        });*/


        /*$model2 = DbNew::getDb()->cache(function ($db) {
            return DbNew::find()->All();
        });*/

        $cache->set('form_model_data', $model);
        $cache->set('form_model_data2', $model2);
        $cached_data = $cache->get('form_model_data');
        $cached_data2 = $cache->get('form_model_data2');


        return $this->render('view', ['model' => $cached_data,
            'model2' => $cached_data2]);

    }


    /**
     * This function insert data in table 'form' from user form.php page and using post method
     * @return string
     */
    //   const Notification="";


    public function actionForm()
    {


        $model = new TaskForm();
        // $model2 = new DbNew();
        //    $data=Yii::$app->request->post();

        /*  $model->on($this::Notification, function($event){
              var_dump($event);die;
              //echo '<script>alert("Registered successfully");</script>';
          });*/
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $image = UploadedFile::getInstance($model, 'image');
            $image->saveAs(Yii::getAlias('@ImgPath' . '/' . $image));
            $model->image = $image;
            $data['TaskForm']['image'] = $image->name;
            $url = 'http://192.168.0.173/yii1/site/about';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
            curl_setopt($ch, CURLOPT_POST, true);
      //      curl_setopt($ch,CURLOPT_HEADER,false);
            $sentdata = array(
                'username' => $data['TaskForm']['username'],
                'email' => $data['TaskForm']['email'],
                'image' => $data['TaskForm']['image'],
                'phone' => $data['TaskForm']['phone'],
                'dob' => $data['TaskForm']['dob'],
                'password' => $data['TaskForm']['password']
            );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $sentdata);
            //    $useldata=urlencode($data['TaskForm']['username']);
            //   var_dump($useldata);die;
            curl_exec($ch);
            curl_close($ch);
        }



        /*if(Yii::$app->request->isPost) {
/*
            if ($this->model->load(Yii::$app->request->post(),'TaskForm')) {
                $image = UploadedFile::getInstance($this->model, 'image');
                $image->saveAs(Yii::getAlias('@ImgPath' . '/' . $image));
                $this->model->image = $image;
*/

        /*if($model->save()) {
     //       $model->trigger(TaskForm::FORM_FILLED);
       //     Yii::$app->session->setFlash('success','All enteries are successfully saved');
            $event=new DataEvent();
            $event->data=$model;
            $model->trigger(self::Notification,$event);
        }
*/
        /*          $db1 = Yii::$app->db->createCommand("INSERT INTO form(username,email,image,phone,dob,password) VALUE (Yii::$app->request->post('array','username'),Yii::$app->request->post('array','email'),Yii::$app->request->post('array','image'),Yii::$app->request->post('array','phone'),Yii::$app->request->post('array','dob'),Yii::$app->request->post('array','password'))")->execute();
                  $db2 = Yii::$app->db2->createCommand("INSERT INTO user(username,email,image,phone,dob,password) VALUE ('$model->username','$model->email ','$model->image ',' $model->phone ',' $model->dob ',' $model->password ')")->execute();
                  mail($model->email, "Registration successful mail", 'Welcome, ' . $model->username);
                  var_dump($db1);
                  var_dump($db2);
                  die();*/

        /* if ($model2->load(Yii::$app->request->post(),'TaskForm')) {

             $image = UploadedFile::getInstance($model, 'image');
             $image->saveAs(Yii::getAlias('@ImgPath' . '/' . $image));
             $model2->image = $image;


             return $this->render('enteredDetail', ['model' => $model2]);
         }*/


        return $this->render('form', ['model' => $model]);

    }


    /**
     * @param $id of record that is to be edited
     * @return string, fetched data from table 'form' of the given id
     */
    public function actionEdit($id)
    {

        //  $model=new View();
        $model = TaskForm::findOne($id);
        return $this->render('update', ['model' => $model]);
    }


    /**
     * @param $id of record that is to be updated
     * @return string to page enteredDetail.php to display details entered
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionEntereddetail($id)
    {

        $model = TaskForm::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            $image->saveAs(Yii::getAlias('@ImgPath' . '/' . $image));
            $model->image = $image;
            $model->update();

            /*            mail($model->email, "Details updated successfully", $model->username . ', Your details has been updated successfully');*/

            return $this->render('enteredDetail', ['model' => $model]);
        }

        return $this->render('form', ['model' => $model]);
    }
    /**
     * this function download's csv file which contains he data of yii2advanced database 'form' table data
     */


    public function actionDownload()
    {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=Tabledata.csv');

        $models = TaskForm::find()->All();
        $fp = fopen("php://output", "w");

        $headers = array(

            'username',
            'email',
            'image',
            'phone',
            'dob',
            'password',

        );
        foreach ($models as $model => $val) {
            foreach ($val as $key => $value) {
                /* var_dump($val['username']);die;*/
                $row = array();
                foreach ($headers as $head) {
                    /* var_dump($val[$head]);die;*/
                    $row[] = $val[$head];

                }
            }
            fputcsv($fp, $row);
        }

    }

    /**
     * this function download's csv file which contains he data of yii2new database 'user' table data
     */

    public function actionDownload2()
    {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=Tabledata2.csv');

        $models = DbNew::find()->All();
        $fp = fopen("php://output", "w");

        $headers = array(
            'username',
            'email',
            'image',
            'phone',
            'dob',
            'password',
        );
        foreach ($models as $model => $val) {
            foreach ($val as $key => $value) {

                $row = array();
                foreach ($headers as $head) {

                    $row[] = $val[$head];

                }
            }
            fputcsv($fp, $row);
        }

    }

    /**
     * this function download's xls file which contains he data of yii2advanced database 'form' table data
     */


    public function actionDownxl()
    {

        $model = TaskForm::find()->All();
        $output = '';
        $output .= '<table>
                      <tr>                       
                        <th>NAME</th>
                        <th>PHONE NO</th>
                        <th>EMAIL</th>
                        <th>DATE OF BIRTH</th>
                        <th>IMAGE NAME</th>
                        <th>PASSWORD</th>
                      </tr>';

        foreach ($model as $row) {
            $output .= '<tr>
                            <td>' . $row["username"] . '</td>
                            <td>' . $row["phone"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td>' . $row["dob"] . '</td>
                            <td>' . $row["image"] . '</td>
                            <td>' . $row["password"] . '</td>
                       </tr>';
        }
        $output .= '</table>';
        header('Content-Disposition:attachment; filename=FileXls.xls');
        header('Content-Type: application/xls;');
        echo $output;

    }

    /**
     * this function download's xls file which contains he data of yii2advanced database 'form' table data
     */
    public function actionDownxl2()
    {

        $model = DbNew::find()->All();
        $output = '';
        $output .= '<table>
                      <tr>                       
                        <th>NAME</th>
                        <th>PHONE NO</th>
                        <th>EMAIL</th>
                        <th>DATE OF BIRTH</th>
                        <th>IMAGE NAME</th>
                        <th>PASSWORD</th>
                      </tr>';

        foreach ($model as $row) {
            $output .= '<tr>
                            <td>' . $row["username"] . '</td>
                            <td>' . $row["phone"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td>' . $row["dob"] . '</td>
                            <td>' . $row["image"] . '</td>
                            <td>' . $row["password"] . '</td>
                       </tr>';
        }
        $output .= '</table>';
        header('Content-Disposition:attachment; filename=FileXls2.xls');
        header('Content-Type: application/xls;');
        echo $output;

    }

    /*public function actionLogin(){

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new TaskForm();
        if($model->load(Yii::$app->request->post())) {

            $model->scenario = 'login';
            return $this->goBack();
/*            return $this->render('/site/index');

        }
        return $this->render('login',['model'=>$model]);
    }*/


    public function actionLogin(){
        $model=new TaskForm();
        if(Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $username=$model->username;

            var_dump($username);
            die;
        }
        return $this->render('login',['model'=>$model]);
    }
}

?>