<?php
/* @var $this NtpController */
/* @var $data Ntp */
?>

<?php echo 'Date of Notice:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->date_of_notice);
	echo '</b>';
	echo '<br />';
	?>

	<?php echo 'Time of Notice:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->time_of_notice);
	echo '</b>';
	?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details);
	?>
	<br />

	
	<?php
	if(isset($data->purchase_order)){
	$pdf=explode(".pdf",$data->purchase_order);
	echo '<a href="files/po/'.$data->purchase_order.'">Download Purchase Order ('.$pdf[0].'.pdf) </a>';
	}
	?>

</div>
