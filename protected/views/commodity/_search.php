<?php
/* @var $this CommodityController */
/* @var $model Commodity */
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
		<?php echo $form->label($model,'group'); ?>
		<?php echo $form->textField($model,'group'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'revenue'); ?>
		<?php echo $form->textField($model,'revenue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profit'); ?>
		<?php echo $form->textField($model,'profit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orders'); ?>
		<?php echo $form->textField($model,'orders'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'costs'); ?>
		<?php echo $form->textField($model,'costs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turnover'); ?>
		<?php echo $form->textField($model,'turnover'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clicks'); ?>
		<?php echo $form->textField($model,'clicks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->