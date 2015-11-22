<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18.11.15
 * Time: 21:02
 */

class ChartForm extends CWidget
{
    public $data;
    public $title;
    public $type;
    public $list;
    public $model;

    public function run()
    {
        //$model = new Login;
        //echo $this->title;
        $this->render('chartform', array(
            'data' => $this->data,
            'title' => $this->title,
            'model' => $this->model,
            'list' => $this->list,
            'type' => $this->type,
        ));
    }
}