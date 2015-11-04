<?php

/**
 * Import1CForm class.
 * Import1CForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */

class Import1CForm extends CFormModel {

    public $image;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            //note you wont need a safe rule here
            array('image', 'file', 'allowEmpty' => true, 'types' => 'txt, xml'),
        );
    }

}