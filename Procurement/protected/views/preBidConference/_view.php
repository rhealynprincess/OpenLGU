<?php
/* @var $this PreBidConferenceController */
/* @var $data PreBidConference */
?>

	<?php echo 'Date:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->date_start); 
	echo ' - ';	
	echo CHtml::encode($data->date_end); 
	echo '</b>';	
	echo ' <br /> ';	
	?>
	<?php echo 'Time:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->time_start); 
	echo ' - ';	
	echo CHtml::encode($data->time_end); 
	echo '</b>';
	?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />
<!-- 
	<b><?php echo CHtml::encode($data->getAttributeLabel('participants')); ?>:</b>
	<?php echo CHtml::encode($data->participants); ?>
	<br />

 -->
</div>
