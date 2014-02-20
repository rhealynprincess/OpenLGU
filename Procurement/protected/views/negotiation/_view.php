<?php
/* @var $this NegotiationController */
/* @var $data Negotiation */
?>
	
	<?php echo 'Date:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->date_start); 
	echo ' - ';	
	echo CHtml::encode($data->date_end); 
	echo '</b>';
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


</div>