<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18.11.15
 * Time: 15:55
 */

class ChartDataForm extends CFormModel
{
    public $startDate;
    public $endDate;
    public $data;
    public $type;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // name, email, subject and body are required
            array('startDate, endDate, type, data', 'required'),
            // array('startDate', 'safe'),
            // email has to be a valid email address
            // array('email', 'email'),
            // verifyCode needs to be entered correctly
            // array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }


    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'startDate'=>'Start Date',
        );
    }
}
