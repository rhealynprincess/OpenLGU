<?php
/* @var $this PaymentHolderController */
/* @var $model PaymentHolder */

$this->breadcrumbs=array(
	'Payment Holders'=>array('index'),
	$model->payment_holder_id=>array('view','id'=>$model->payment_holder_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaymentHolder', 'url'=>array('index')),
	array('label'=>'Create PaymentHolder', 'url'=>array('create')),
	array('label'=>'View PaymentHolder', 'url'=>array('view', 'id'=>$model->payment_holder_id)),
	array('label'=>'Manage PaymentHolder', 'url'=>array('admin')),
);
?>

<h1>Update PaymentHolder <?php echo $model->payment_holder_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>