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

	<b><?php echo "Date" ?>:</b>
    <?php echo CHtml::encode(Sales::model()->findByPk($data->sales_id)->date); ?>
	<br />


</div>