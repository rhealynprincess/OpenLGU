<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<span class="userTitle"><b>
		<?php
		$fName = $data->first_name.' '.strtoupper(substr($data->middle_name,0,1)).'. '.$data->last_name;
		echo CHtml::link(CHtml::encode($fName), array('view', 'id'=>$data->id)); 
		?>
	</b></span>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_num')); ?>:</b>
	<?php echo CHtml::encode($data->tel_num); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('email_add')); ?>:</b>
	<?php echo CHtml::encode($data->email_add); ?>
	<br />
	<?php 
	?>

</div>
