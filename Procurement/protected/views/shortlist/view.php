<?php
/* @var $this ShortlistController */
/* @var $model Shortlist */

$this->breadcrumbs=array(
	'Shortlists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Shortlist', 'url'=>array('index')),
	array('label'=>'Create Shortlist', 'url'=>array('create')),
	array('label'=>'Update Shortlist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Shortlist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Shortlist', 'url'=>array('admin')),
);
?>

<h1>View Shortlist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_start',
		'date_end',
		'time_start',
		'time_end',
		'details',
	),
)); ?>
