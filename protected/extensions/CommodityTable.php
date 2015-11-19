<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18.11.15
 * Time: 22:45
 */

class CommodityTable extends CWidget
{
    public $models;
    public $title;

    public function run()
    {
        //$model = new Login;
        //echo $this->title;
        $this->render('commoditytable', array(
            'models' => $this->models,
            'title' => $this->title,
        ));
    }
}