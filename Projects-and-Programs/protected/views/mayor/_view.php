<?php
/* @var $this MayorController */
/* @var $data Mayor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_program_no')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->project_program_no), array('view', 'id'=>$data->project_program_no)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_program_title')); ?>:</b>
	<?php echo CHtml::encode($data->project_program_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source_of_fund')); ?>:</b>
	<?php echo CHtml::encode($data->source_of_fund); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_started')); ?>:</b>
	<?php echo CHtml::encode($data->date_started); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_completed')); ?>:</b>
	<?php echo CHtml::encode($data->date_completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo CHtml::encode($data->due_date); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />	

	<b><?php echo CHtml::encode($data->getAttributeLabel('contractor')); ?>:</b>
	<?php echo CHtml::encode($data->contractor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sector')); ?>:</b>
	<?php echo CHtml::encode($data->sector); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />


</div>
