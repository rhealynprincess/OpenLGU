<?php
/* @var $this ApprovalController */
/* @var $data Approval */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_reg_num')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->business_reg_num), array('view', 'id'=>$data->approval_id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('full_business_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_business_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval_status')); ?>:</b>
	<?php echo CHtml::encode($data->approval_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

</div>
