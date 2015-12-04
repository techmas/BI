<?php
/* @var $this CommodityController */
/* @var $data Commodity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profit')); ?>:</b>
	<?php echo CHtml::encode($data->profit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('revenue')); ?>:</b>
	<?php echo CHtml::encode($data->revenue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_id')); ?>:</b>
	<?php echo CHtml::encode($data->sales_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platform_id')); ?>:</b>
	<?php echo CHtml::encode($data->platform_id); ?>
	<br />


</div>