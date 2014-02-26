<?php
/* @var $this AddressController */
/* @var $data Address */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->address_id), array('view', 'id'=>$data->address_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_num')); ?>:</b>
	<?php echo CHtml::encode($data->unit_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subdivision')); ?>:</b>
	<?php echo CHtml::encode($data->subdivision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('barangay')); ?>:</b>
	<?php echo CHtml::encode($data->barangay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sys_entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->sys_entry_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('full_address')); ?>:</b>
	<?php echo CHtml::encode($data->full_address); ?>
	<br />

	*/ ?>

</div>