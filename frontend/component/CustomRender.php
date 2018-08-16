<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 6/8/18
 * Time: 7:51 PM
 */

namespace frontend\component;

use yii\base\Controller;
use Yii;
use yii\base\ErrorException;

class CustomRender extends Controller
{

    public function render($view1 = [], $view2 = [], $view3 = [])
    {
        // print_r($view2);die;
        $layoutFile = $this->findLayoutFile($this->getView());
        $layoutpath = Yii::$app->getLayoutPath() . '/twocolumnleft.php';
        $layoutpath2 = Yii::$app->getLayoutPath() . '/twocolumnright.php';
        $layoutpath3 = Yii::$app->getLayoutPath() . '/threecolumn.php';
        $layoutpath4 = Yii::$app->getLayoutPath() . '/column.php';


        if ($layoutFile == $layoutpath && (empty($view1[1])) && (!empty($view1[0])) && (!empty($view2[0])) && (!empty($view2[1]))) {
            try {
                $array_view = [];

                $renderpg1 = $view1[0];
                // $renderparam1 = $view1[1];


                $renderpg2 = $view2[0];
                $renderparam2 = $view2[1];

                $content1 = $this->getView()->render($renderpg1, $renderparam1 = [], $this);
                $content2 = $this->getView()->render($renderpg2, $renderparam2, $this);

                array_push($array_view, $content1);
                array_push($array_view, $content2);


                return $this->renderContent($array_view);
                /*}
                catch (\Exception $exception){
                  echo 'some parameter is missing';
                }*/
            } catch (ErrorException $e) {
                throw new \yii\web\ServerErrorHttpException('Some parameters are missing');

            }

        } else if ((!empty($view1[0])) && (!empty($view1[1])) && (!empty($view2[0])) && (!empty($view2[1])) && $layoutFile == $layoutpath2) {

            try {
                $array_view = [];

                $renderpg1 = $view1[0];
                $renderparam1 = $view1[1];


                $renderpg2 = $view2[0];
                $renderparam2 = $view2[1];

                $content1 = $this->getView()->render($renderpg1, $renderparam1, $this);
                $content2 = $this->getView()->render($renderpg2, $renderparam2, $this);

                array_push($array_view, $content1);
                array_push($array_view, $content2);

                return $this->renderContent($array_view);

            } catch (\Exception $exception) {
                throw new \yii\web\HttpException(404);
            }

        } else if ((!empty($view1[0])) && (empty($view1[1])) && (!empty($view2[0])) && (!empty($view2[1])) && (!empty($view3[0])) && (!empty($view3[1])) && $layoutFile == $layoutpath3) {

            try {
                $array_view = [];

                $renderpg1 = $view1[0];
                //   $renderparam1 = $view1[1];


                $renderpg2 = $view2[0];
                $renderparam2 = $view2[1];

                $renderpg3 = $view3[0];
                $renderparam3 = $view3[1];


                $content1 = $this->getView()->render($renderpg1, $renderparam1 = [], $this);
                $content2 = $this->getView()->render($renderpg2, $renderparam2, $this);
                $content3 = $this->getView()->render($renderpg3, $renderparam3, $this);

                array_push($array_view, $content1);
                array_push($array_view, $content2);
                array_push($array_view, $content3);


                return $this->renderContent($array_view);
            } catch (\Exception $exception) {
                throw new \yii\web\HttpException(404);

            }


        } else if ((!empty($view1[0])) && (empty($view1[1])) && $layoutFile == $layoutpath4) {
            try {
                $array_view = [];

                $renderpg1 = $view1[0];
                //$renderparam1 = $view1[1];

                $content1 = $this->getView()->render($renderpg1, $renderparam1 = [], $this);
var_dump($content1);die;
                array_push($array_view, $content1);

                return $this->renderContent($array_view);
            } catch (\Exception $exception) {
                throw new \yii\web\HttpException(404);

            }
        } else {
            throw new \yii\web\HttpException(404);
        }

    }

    public function renderContent($content)
    {
        $layoutFile = $this->findLayoutFile($this->getView());
        $layoutpath = Yii::$app->getLayoutPath() . '/twocolumnleft.php';
        $layoutpath2 = Yii::$app->getLayoutPath() . '/twocolumnright.php';
        $layoutpath3 = Yii::$app->getLayoutPath() . '/threecolumn.php';
        $layoutpath4 = Yii::$app->getLayoutPath() . '/column.php';
        /*var_dump($layoutFile);die;*/
        if ($layoutFile == $layoutpath) {
            if ($layoutFile !== false) {
                return $this->getView()->renderFile($layoutFile, ['left' => $content[0], 'right' => $content[1]], $this);
            }


            return $content;
        }
        if ($layoutFile == $layoutpath2) {
            if ($layoutFile !== false) {
                return $this->getView()->renderFile($layoutFile, ['left' => $content[0], 'right' => $content[1]], $this);
            }


            return $content;
        }
        if ($layoutFile == $layoutpath3) {
            if ($layoutFile !== false) {
                return $this->getView()->renderFile($layoutFile, ['left' => $content[0], 'content' => $content[1], 'right' => $content[2]], $this);
            }


            return $content;
        }
        if ($layoutFile == $layoutpath4) {
            var_dump($content[0]);die;
            if ($layoutFile !== false) {
                return $this->getView()->renderFile($layoutFile, ['content' => $content[0]], $this);
            }


            return $content;
        }


    }
    /*public function render($views = [], $params = [])
    {
        $viewarr = [];

        $view_count = count($views);

        for ($i = 0; $i < $view_count; $i++) {
            $content[$i] = $this->getView()->render($views[$i], $params[$i], $this);

            array_push($viewarr, $content[$i]);
        }

        return $this->renderContent($viewarr);
    }


    public function renderContent($content = [])
    {
        $countcon = count($content);
        $array = [];
        $layoutFile = $this->findLayoutFile($this->getView());
        if ($layoutFile !== false) {

            for ($i = 0; $i < $countcon; $i++) {
                return $this->getView()->renderFile($layoutFile, array('content' => $content[$i]), $this);
               array_push($array, $content[$i]);
            }



        }
    //    var_dump($array);die;
        return $array;

    }*/

}
