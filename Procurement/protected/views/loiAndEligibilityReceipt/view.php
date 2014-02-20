<?php
/* @var $this LoiAndEligibilityReceiptController */
/* @var $model LoiAndEligibilityReceipt */

$this->breadcrumbs=array(
	'Loi And Eligibility Receipts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LoiAndEligibilityReceipt', 'url'=>array('index')),
	array('label'=>'Create LoiAndEligibilityReceipt', 'url'=>array('create')),
	array('label'=>'Update LoiAndEligibilityReceipt', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LoiAndEligibilityReceipt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LoiAndEligibilityReceipt', 'url'=>array('admin')),
);
?>

<h1>View LoiAndEligibilityReceipt #<?php echo $model->id; ?></h1>

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
