<?php
/* @var $this MeasureController */
/* @var $model Measure */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'measure-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'epc'); ?>
		<?php echo $form->textField($model,'epc'); ?>
		<?php echo $form->error($model,'epc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ltv'); ?>
		<?php echo $form->textField($model,'ltv'); ?>
		<?php echo $form->error($model,'ltv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arpu'); ?>
		<?php echo $form->textField($model,'arpu'); ?>
		<?php echo $form->error($model,'arpu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'crs'); ?>
		<?php echo $form->textField($model,'crs'); ?>
		<?php echo $form->error($model,'crs'); ?>
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