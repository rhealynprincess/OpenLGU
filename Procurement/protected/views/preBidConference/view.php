<?php
/* @var $this PreBidConferenceController */
/* @var $model PreBidConference */

$this->breadcrumbs=array(
	'Pre Bid Conferences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PreBidConference', 'url'=>array('index')),
	array('label'=>'Create PreBidConference', 'url'=>array('create')),
	array('label'=>'Update PreBidConference', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PreBidConference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PreBidConference', 'url'=>array('admin')),
);
?>

<h1>View PreBidConference #<?php echo $model->id; ?></h1>

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
