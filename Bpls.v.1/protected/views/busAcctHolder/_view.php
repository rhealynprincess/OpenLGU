<?php
/* @var $this BusAcctHolderController */
/* @var $data BusAcctHolder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->application_date), array('view', 'id'=>$data->account_holder_id)); ?>
	<br />


</div>
