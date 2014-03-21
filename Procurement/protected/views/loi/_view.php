<?php
/* @var $this LoiController */
/* @var $data Loi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invitation_id')); ?>:</b>
	<?php echo CHtml::encode($data->invitation_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_submitted')); ?>:</b>
	<?php echo CHtml::encode($data->date_submitted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_submitted')); ?>:</b>
	<?php echo CHtml::encode($data->time_submitted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>