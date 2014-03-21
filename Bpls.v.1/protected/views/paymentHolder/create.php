<?php
/* @var $this PaymentHolderController */
/* @var $model PaymentHolder */

$this->breadcrumbs=array(
	'Payment Holders'=>array('admin'),
	'Create Payment Holder',
);


?>

<h3 style="text-align:center"><b>Create Payment Holder</b></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
