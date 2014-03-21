<?php
/* @var $this ProgressController */
/* @var $data Progress */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->progress_id), array('view', 'id'=>$data->progress_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_id')); ?>:</b>
	<?php echo CHtml::encode($data->business_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_information')); ?>:</b>
	<?php echo CHtml::encode($data->business_information); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('documents')); ?>:</b>
	<?php echo CHtml::encode($data->documents); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assessment')); ?>:</b>
	<?php echo CHtml::encode($data->assessment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment')); ?>:</b>
	<?php echo CHtml::encode($data->payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval')); ?>:</b>
	<?php echo CHtml::encode($data->approval); ?>
	<br />


</div>