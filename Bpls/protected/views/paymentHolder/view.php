<?php
/* @var $this PaymentHolderController */
/* @var $model PaymentHolder */

$this->breadcrumbs=array(
	'Payment Holders'=>array('index'),
	$model->payment_holder_id,
);

$this->menu=array(
	array('label'=>'List PaymentHolder', 'url'=>array('index')),
	array('label'=>'Create PaymentHolder', 'url'=>array('create')),
	array('label'=>'Update PaymentHolder', 'url'=>array('update', 'id'=>$model->payment_holder_id)),
	array('label'=>'Delete PaymentHolder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->payment_holder_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaymentHolder', 'url'=>array('admin')),
);
?>

<h1>View PaymentHolder #<?php echo $model->payment_holder_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'payment_holder_id',
		'account_holder_id',
		'business_id',
	),
)); ?>
