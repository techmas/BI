<?php
/* @var $this ImportController */

$this->breadcrumbs=array(
	'Import'=>array('/import'),
	'Import1C',
);
?>

<?php if(Yii::app()->user->hasFlash('success')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>

        <?php

        //echo $json;
        /*
        //decode json post input as php array:
        $data = CJSON::decode($json, true);

        //contact is a Yii model:
        $contact = new Contact();

        //load json data into model:
        $contact->attributes = $data;
        //this is for responding to the client:
        $response = array();

        //save model, if that fails, get its validation errors:
        if ($contact->save() === false) {
        $response['success'] = false;
        $response['errors'] = $contact->errors;
        } else {
        $response['success'] = true;

        //respond with the saved contact in case the model/db changed any values
        $response['contacts'] = $contact;
        }

        //respond with json content type:
        header('Content-type:application/json');

        //encode the response as json:
        echo CJSON::encode($response);

        //use exit() if in debug mode and don't want to return debug output
        exit();*/

        ?>


    </div>

<?php else: ?>

<h1>Импорт данных из 1С</h1>

<div class="form">
    <?php echo $form; ?>
</div>

<?php endif; ?>