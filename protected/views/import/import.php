<?php
/* @var $this ImportController */
/* @var $modelGA ImportGAForm */
/* @var $form1C CActiveForm */
/* @var $formGA CActiveForm */

$this->breadcrumbs=array(
    'Import',
);
?>

    <h1>Импорт визитов из Google Analytics</h1>

<?php if(Yii::app()->user->hasFlash('successGA')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('successGA'); ?>

    </div>

<?php else: ?>

    <div class="form">

        <?php $formGA=$this->beginWidget('CActiveForm', array(
            'id'=>'contact-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <?php //echo $formGA->errorSummary($modelGA); ?>

        <div class="row">
            <?php echo $formGA->labelEx($modelGA,'Период с:'); ?>
            <?php echo $formGA->textField($modelGA,'name'); ?>
            <?php //echo $form->error($model,'name'); ?>
        </div>

        <div class="row">
            <?php echo $formGA->labelEx($modelGA,'по:'); ?>
            <?php echo $formGA->textField($modelGA,'email'); ?>
            <?php //echo $form->error($model,'email'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Импорт'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('success1C')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success1C'); ?>
    </div>

<?php else: ?>

    <h1>Импорт данных из 1С</h1>

    <div class="form">
        <?php echo $form1C; ?>
    </div>

<?php endif; ?>