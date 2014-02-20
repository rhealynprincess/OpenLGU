<?php
/* @var $this NegotiationController */
/* @var $model Negotiation */

$this->breadcrumbs=array(
	'Negotiations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Negotiation', 'url'=>array('index')),
	array('label'=>'Create Negotiation', 'url'=>array('create')),
	array('label'=>'Update Negotiation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Negotiation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Negotiation', 'url'=>array('admin')),
);
?>

<h1>View Negotiation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_start',
		'date_end',
		'time_start',
		'time_end',
		'details',
		'participants',
	),
)); ?>
