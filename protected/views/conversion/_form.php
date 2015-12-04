<?php
/* @var $this ConversionController */
/* @var $model Conversion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conversion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target_id'); ?>
		<?php echo $form->textField($model,'target_id'); ?>
		<?php echo $form->error($model,'target_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platform_id'); ?>
		<?php echo $form->textField($model,'platform_id'); ?>
		<?php echo $form->error($model,'platform_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_id'); ?>
		<?php echo $form->textField($model,'sales_id'); ?>
		<?php echo $form->error($model,'sales_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->