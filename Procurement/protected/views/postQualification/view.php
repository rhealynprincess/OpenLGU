<?php
/* @var $this PostQualificationController */
/* @var $model PostQualification */

$this->breadcrumbs=array(
	'Post Qualifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PostQualification', 'url'=>array('index')),
	array('label'=>'Create PostQualification', 'url'=>array('create')),
	array('label'=>'Update PostQualification', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PostQualification', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PostQualification', 'url'=>array('admin')),
);
?>

<h1>View PostQualification #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_start',
		'date_end',
		'time_start',
		'time_end',
		'details',
		'lcrb',
	),
)); ?>
