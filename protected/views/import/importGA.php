<?php
/* @var $this ImportController */
/* @var $model ImportGAForm */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Import'=>array('/import'),
	'ImportGA',
);
?>

    <h1>Импорт визитов из Google Analytics</h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>

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
            <?php //echo $form->labelEx($model,'Период с:'); ?>
            <?php //echo $form->textField($model,'name'); ?>
            <?php //echo $form->error($model,'name'); ?>
        </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'по:'); ?>
            <?php //echo $form->textField($model,'email'); ?>
            <?php //echo $form->error($model,'email'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Импорт'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>