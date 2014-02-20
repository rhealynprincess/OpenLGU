<?php
/* @var $this PostQualificationController */
/* @var $data PostQualification */
?>

<?php 
$inv = Invitation::model()->findByPk($data->id);
echo '<b>Least Calculated Responsive Bid: </b>';
$org = Organization::model()->findByPk($inv->lcrb);
if(isset($org))
echo $org->name;
echo '<br/>';
?>

	<?php echo 'Date:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->date_start); 
	echo ' - ';	
	echo CHtml::encode($data->date_end); 
	echo '</b>';
	echo '<br />';
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
	<?php echo CHtml::encode($data->details); 
	?>
	<br />


</div>
