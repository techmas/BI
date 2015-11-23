<?php
/* @var $this MeasureController */
/* @var $data Measure */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('epc')); ?>:</b>
	<?php echo CHtml::encode($data->epc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ltv')); ?>:</b>
	<?php echo CHtml::encode($data->ltv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arpu')); ?>:</b>
	<?php echo CHtml::encode($data->arpu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crs')); ?>:</b>
	<?php echo CHtml::encode($data->crs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_id')); ?>:</b>
	<?php echo CHtml::encode($data->sales_id); ?>
	<br />


</div>