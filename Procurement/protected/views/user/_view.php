<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<span class="userTitle"><b><?php
	$fName = $data->first_name.' '.strtoupper(substr($data->middle_name,0,1)).'. '.$data->last_name;
	echo CHtml::link(CHtml::encode($fName), array('view', 'id'=>$data->id)); ?></b></span>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />
	
	<?php /* echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />
		
	<?php
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	*/ ?>

</div>
