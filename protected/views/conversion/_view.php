<?php
/* @var $this ConversionController */
/* @var $data Conversion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_id')); ?>:</b>
	<?php echo CHtml::encode($data->target_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platform_id')); ?>:</b>
	<?php echo CHtml::encode($data->platform_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_id')); ?>:</b>
	<?php echo CHtml::encode($data->sales_id); ?>
	<br />


</div>