<?php
/* @var $this CommodityController */
/* @var $model Commodity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'commodity-form',
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
		<?php echo $form->labelEx($model,'group'); ?>
		<?php echo $form->textField($model,'group'); ?>
		<?php echo $form->error($model,'group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'revenue'); ?>
		<?php echo $form->textField($model,'revenue'); ?>
		<?php echo $form->error($model,'revenue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profit'); ?>
		<?php echo $form->textField($model,'profit'); ?>
		<?php echo $form->error($model,'profit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orders'); ?>
		<?php echo $form->textField($model,'orders'); ?>
		<?php echo $form->error($model,'orders'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'costs'); ?>
		<?php echo $form->textField($model,'costs'); ?>
		<?php echo $form->error($model,'costs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'turnover'); ?>
		<?php echo $form->textField($model,'turnover'); ?>
		<?php echo $form->error($model,'turnover'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clicks'); ?>
		<?php echo $form->textField($model,'clicks'); ?>
		<?php echo $form->error($model,'clicks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->