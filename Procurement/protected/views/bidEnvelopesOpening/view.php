<?php
/* @var $this BidEnvelopesOpeningController */
/* @var $model BidEnvelopesOpening */

$this->breadcrumbs=array(
	'Bid Envelopes Openings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BidEnvelopesOpening', 'url'=>array('index')),
	array('label'=>'Create BidEnvelopesOpening', 'url'=>array('create')),
	array('label'=>'Update BidEnvelopesOpening', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BidEnvelopesOpening', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BidEnvelopesOpening', 'url'=>array('admin')),
);
?>

<h1>View BidEnvelopesOpening #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'summaryText'=>'',
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
