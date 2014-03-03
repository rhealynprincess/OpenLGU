<?php
/* @var $this EmergencyContactController */
/* @var $data EmergencyContact */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->emergency_id), array('view', 'id'=>$data->emergency_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('middle_name')); ?>:</b>
	<?php echo CHtml::encode($data->middle_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suffix_name')); ?>:</b>
	<?php echo CHtml::encode($data->suffix_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_num')); ?>:</b>
	<?php echo CHtml::encode($data->contact_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_relationship')); ?>:</b>
	<?php echo CHtml::encode($data->contact_relationship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sys_entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->sys_entry_date); ?>
	<br />

	*/ ?>

</div>