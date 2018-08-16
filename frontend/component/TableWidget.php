<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 1/8/18
 * Time: 1:03 PM
 */

namespace frontend\component;

use yii\base\Widget;
use yii\helpers\Html;

class TableWidget extends Widget
{

    /**
     * @var array ,that is gonna used as input in table to print data
     * @var option could be a associative the
     */

    public $column;
    public $columns;
    public $tabledata;
    public $tableData;


    /**
     * @param $data
     * @param array $option
     * @return mixed
     *
     *
     */


    public function init()
    {
        parent::init();
        $columns = $this->column;
        $tableData = $this->tabledata;
    }


    /* public function abc($object2 = [])
     {
      //      parent::init();
         //  $this->column=$object2;

          var_dump($object2);





         echo "<table><tr>";
         foreach ($object2 as $k => $val) {
             foreach ($val as $item => $v) {

                 echo "<th>" . $v['index'] . "</th>";
             }
            /* echo "</tr>";
              foreach ($object as $key=>$value){
                  echo "<tr><td>".$value['username']."</td><td>".$value['email']."</td><td>".$value['phone']."</td><td>".$value['dob']."</td><td>".$value['image']."</td></tr>";
              }

         }

         /*public function table($data, $option=[] ){

             return table($data,$option);


         }
    /*/

    public function run()
    {
        $columns = $this->column;
        $tableData = $this->tabledata;
        echo "<br><br><br><br>";
        $html = '';
        $html .= "<table><tr>";
        foreach ($columns as $item => $value) {
            $html .= "<th>" . $value['lable'] . "</th>";
        }
        $html .= "<th>Action</th></tr><tr>";
       /* var_dump($tableData);die;*/
        foreach ($tableData as $data) {
        //    $html .= '<tr>';
            foreach ($data->attributes as $colName => $colVal) {
                foreach ($columns as $column) {

                        if ($column['index'] == $colName) {
                            if ($column['index'] == 'image') {
                                $html .= '<td><img src="/yii1/images/' . $colVal . '" style="height: 45px;"></td>';
                            } else {
                                /* if ($column['index'] == 'image') {*/
                                $html .= '<td>' . $colVal . '</td>';
                                //}

                            }
                        }
                }
            }
            $html.="<td><a href='/yii1/new/edit?id=".$data['id']."'><input type='button' value='Edit' name=".$data['id']."></input></a></td>";
            $html.="<td><a href='/yii1/new/del?id=".$data['id']."'><input type='button' value='DELETE' name=".$data['id']."></input></a></td>";
            $html .= '</tr>';

        }
        $html.='</table>';
        return $html;

    }
}