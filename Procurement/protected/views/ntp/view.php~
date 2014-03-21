<?php
/* @var $this NtpController */
/* @var $model Ntp */

$this->breadcrumbs=array(
	'Ntps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ntp', 'url'=>array('index')),
	array('label'=>'Create Ntp', 'url'=>array('create')),
	array('label'=>'Update Ntp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ntp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ntp', 'url'=>array('admin')),
);
?>

<h1>View Ntp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_of_notice',
		'time_of_notice',
		'details',
		'purchase_order',
	),
)); ?>
