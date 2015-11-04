<?php
/* @var $this CommodityController */
/* @var $data Commodity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group')); ?>:</b>
	<?php echo CHtml::encode($data->group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('revenue')); ?>:</b>
	<?php echo CHtml::encode($data->revenue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profit')); ?>:</b>
	<?php echo CHtml::encode($data->profit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orders')); ?>:</b>
	<?php echo CHtml::encode($data->orders); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costs')); ?>:</b>
	<?php echo CHtml::encode($data->costs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('turnover')); ?>:</b>
	<?php echo CHtml::encode($data->turnover); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('clicks')); ?>:</b>
	<?php echo CHtml::encode($data->clicks); ?>
	<br />

	*/ ?>

</div>