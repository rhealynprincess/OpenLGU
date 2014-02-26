<?php
/* @var $this PaymentHolderController */
/* @var $data PaymentHolder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_holder_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->payment_holder_id), array('view', 'id'=>$data->payment_holder_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_holder_id')); ?>:</b>
	<?php echo CHtml::encode($data->account_holder_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_id')); ?>:</b>
	<?php echo CHtml::encode($data->business_id); ?>
	<br />


</div>