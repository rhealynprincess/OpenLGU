<?php
/* @var $this IssuanceController */
/* @var $data Issuance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuance_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issuance_id), array('view', 'id'=>$data->issuance_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval_id')); ?>:</b>
	<?php echo CHtml::encode($data->approval_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_reg_num')); ?>:</b>
	<?php echo CHtml::encode($data->business_reg_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_business_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_business_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('or_reference')); ?>:</b>
	<?php echo CHtml::encode($data->or_reference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('or_reference_date')); ?>:</b>
	<?php echo CHtml::encode($data->or_reference_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('released_to')); ?>:</b>
	<?php echo CHtml::encode($data->released_to); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('scheduled_release_date')); ?>:</b>
	<?php echo CHtml::encode($data->scheduled_release_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actual_release_date')); ?>:</b>
	<?php echo CHtml::encode($data->actual_release_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuance_barcode_ref')); ?>:</b>
	<?php echo CHtml::encode($data->issuance_barcode_ref); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issued_by_name')); ?>:</b>
	<?php echo CHtml::encode($data->issued_by_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issued_by_id')); ?>:</b>
	<?php echo CHtml::encode($data->issued_by_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sys_entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->sys_entry_date); ?>
	<br />

	*/ ?>

</div>