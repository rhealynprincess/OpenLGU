<?php
/* @var $this TaxpayerController */
/* @var $data Taxpayer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_date')); ?>:</b>
	<?php echo CHtml::encode($data->application_date); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('suffix_name')); ?>:</b>
	<?php echo CHtml::encode($data->suffix_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob_month')); ?>:</b>
	<?php echo CHtml::encode($data->dob_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob_day')); ?>:</b>
	<?php echo CHtml::encode($data->dob_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob_year')); ?>:</b>
	<?php echo CHtml::encode($data->dob_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob_full')); ?>:</b>
	<?php echo CHtml::encode($data->dob_full); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('civil_status')); ?>:</b>
	<?php echo CHtml::encode($data->civil_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tin')); ?>:</b>
	<?php echo CHtml::encode($data->tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sys_entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->sys_entry_date); ?>
	<br />

	*/ ?>

</div>