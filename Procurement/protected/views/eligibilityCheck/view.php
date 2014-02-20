<?php
/* @var $this EligibilityCheckController */
/* @var $model EligibilityCheck */

$this->breadcrumbs=array(
	'Eligibility Checks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EligibilityCheck', 'url'=>array('index')),
	array('label'=>'Create EligibilityCheck', 'url'=>array('create')),
	array('label'=>'Update EligibilityCheck', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EligibilityCheck', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EligibilityCheck', 'url'=>array('admin')),
);
?>

<h1>View EligibilityCheck #<?php echo $model->id; ?></h1>

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
