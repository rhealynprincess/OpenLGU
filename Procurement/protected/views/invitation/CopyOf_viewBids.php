<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="view">

	<!-- 
		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		<br />
	 -->
	 

	<b><?php echo CHtml::encode($data->getAttributeLabel('invitation_id')); ?>:</b>
	<?php echo CHtml::encode($data->invitation_id); ?>
	<br />

</div>