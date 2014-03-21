<?php
/* @var $this AwardingController */
/* @var $model Awarding */

$this->breadcrumbs=array(
	'Awardings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Awarding', 'url'=>array('index')),
	array('label'=>'Create Awarding', 'url'=>array('create')),
	array('label'=>'Update Awarding', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Awarding', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Awarding', 'url'=>array('admin')),
);
?>

<h1>View Awarding #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_awarded',
		'details',
		'awardee',
		'time_awarded',
	),
)); ?>
