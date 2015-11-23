<?php
/* @var $this UserviewController */
/* @var $model Userview */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'startdate'); ?>
		<?php echo $form->textField($model,'startdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enddate'); ?>
		<?php echo $form->textField($model,'enddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chart'); ?>
		<?php echo $form->textField($model,'chart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'table'); ?>
		<?php echo $form->textField($model,'table'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'selection'); ?>
		<?php echo $form->textField($model,'selection'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_id'); ?>
		<?php echo $form->textField($model,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'indicator_id'); ?>
		<?php echo $form->textField($model,'indicator_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->