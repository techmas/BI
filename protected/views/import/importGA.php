<?php
/* @var $this ImportController */
/* @var $model ImportGAForm */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Import'=>array('/import'),
	'ImportGA',
);
?>

    <h1>Импорт данных из Google Analytics</h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>


        <?php
        //error_reporting(E_ALL);
        //ini_set("display_errors",1);

        require 'gapi.class.php';
        define('ga_profile_id','9862155');

        $ga = new gapi("667531573047-t1dg7n8l808ab4rqm81e8q5rvi7eudqe@developer.gserviceaccount.com", "test/integrateGA-6727fbd5be3b.p12");
        //$ga = new gapi("XXXXXXXX@developer.gserviceaccount.com", "key.p12");

        /**
         * Note: OR || operators are calculated first, before AND &&.
         * There are no brackets () for precedence and no quotes are
         * required around parameters.
         *
         * Do not use brackets () for precedence, these are only valid for
         * use in regular expressions operators!
         *
         * The below filter represented in normal PHP logic would be:
         * country == 'United States' && ( browser == 'Firefox || browser == 'Chrome')
         */

        $filter = 'country == United States && browser == Firefox || browser == Chrome';

        $ga->requestReportData(ga_profile_id,array('browser','browserVersion'),array('pageviews','visits'),'-visits',$filter);
        ?>
        <table>
            <tr>
                <th>Browser &amp; Browser Version</th>
                <th>Pageviews</th>
                <th>Visits</th>
            </tr>
            <?php
            foreach($ga->getResults() as $result):
                ?>
                <tr>
                    <td><?php echo $result ?></td>
                    <td><?php echo $result->getPageviews() ?></td>
                    <td><?php echo $result->getVisits() ?></td>
                </tr>
            <?php
            endforeach
            ?>
        </table>

        <table>
            <tr>
                <th>Total Results</th>
                <td><?php echo $ga->getTotalResults() ?></td>
            </tr>
            <tr>
                <th>Total Pageviews</th>
                <td><?php echo $ga->getPageviews() ?>
            </tr>
            <tr>
                <th>Total Visits</th>
                <td><?php echo $ga->getVisits() ?></td>
            </tr>
            <tr>
                <th>Results Updated</th>
                <td><?php //echo $ga->getUpdated() ?></td>
            </tr>
        </table>


    </div>

<?php else: ?>

    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'contact-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'Период с:'); ?>
            <?php echo $form->textField($model,'name'); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'по:'); ?>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>