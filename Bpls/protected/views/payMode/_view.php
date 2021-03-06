<?php
/* @var $this PayModeController */
/* @var $data PayMode */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php if(Yii::app()->user->role == 'REGISTERED' && $data->paymentDetail !== null){ ?>
	<?php echo CHtml::link(CHtml::encode($data->name), array('paymentDetail/view', 'id'=>$data->paymentDetail->payment_detail_id)); ?>
	<?php } elseif(Yii::app()->user->role == 'REGISTERED' && $data->paymentDetail === null){ ?>
	<?php echo CHtml::encode($data->name); ?>
	<?php } elseif(Yii::app()->user->role == 'TREASURY' || Yii::app()->user->role == 'ADMIN'){ ?>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->pay_mode_id)); ?>
	<?php } ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('amount_due')); ?>:</b>
	<?php echo CHtml::encode($data->amount_due); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo CHtml::encode($data->due_date); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('amount_paid')); ?>:</b>
	<?php echo CHtml::encode($data->amount_paid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('or_num')); ?>:</b>
	<?php echo CHtml::encode($data->or_num); ?>
	<br />


</div>
