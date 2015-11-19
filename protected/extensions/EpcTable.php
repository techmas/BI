<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18.11.15
 * Time: 23:00
 */

class EpcTable extends CWidget
{
    public $models;
    public $title;

    public function run()
    {
        //$model = new Login;
        //echo $this->title;
        $this->render('epctable', array(
            'models' => $this->models,
            'title' => $this->title,
        ));
    }
}