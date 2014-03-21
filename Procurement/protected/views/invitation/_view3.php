<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="viewAll" style="border:none;padding:2px">

	<!-- 
		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		<br />
	 -->
	 
	<div class="width30"><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></div>
	

	<div class="width30" style="text-align:center">
	<?php echo CHtml::encode($data->category); ?>
	</div>

	<div class="width40">
	<?php echo CHtml::encode($data->description); ?>
	</div>

</div>