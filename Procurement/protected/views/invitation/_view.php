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
	 
	<span class="invitationTitle"><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></span>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('procuring_entity')); ?>:</b>
	<?php echo CHtml::encode($data->procuring_entity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classification')); ?>:</b>
	<?php echo CHtml::encode($data->classification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_duration')); ?>:</b>
	<?php echo CHtml::encode($data->contract_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_details')); ?>:</b>
	<?php echo CHtml::encode($data->contact_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_published')); ?>:</b>
	<?php echo CHtml::encode($data->date_published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_published')); ?>:</b>
	<?php echo CHtml::encode($data->time_published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_last_modified')); ?>:</b>
	<?php echo CHtml::encode($data->time_last_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_last_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_last_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_closing')); ?>:</b>
	<?php echo CHtml::encode($data->date_closing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_closing')); ?>:</b>
	<?php echo CHtml::encode($data->time_closing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_document_request')); ?>:</b>
	<?php echo CHtml::encode($data->total_document_request); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_of_delivery')); ?>:</b>
	<?php echo CHtml::encode($data->area_of_delivery); ?>
	<br />

	*/ ?>

</div>