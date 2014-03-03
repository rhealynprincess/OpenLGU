<?php
/* @var $this BusAcctDetailController */
/* @var $data BusAcctDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->busAcctHolder->business->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->busAcctHolder->business->name), array('view', 'id'=>$data->account_detail_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->busAcctHolder->business->user->getAttributeLabel('account_holder_name')); ?>:</b>
	<?php echo CHtml::encode($data->busAcctHolder->business->user->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_mode')); ?>:</b>
	<?php echo CHtml::encode($data->pay_mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capital_amount')); ?>:</b>
	<?php echo CHtml::encode($data->capital_amount); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('sys_entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->sys_entry_date); ?>
	<br />

</div>
