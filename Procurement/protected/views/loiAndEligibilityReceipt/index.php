<?php
/* @var $this LoiAndEligibilityReceiptController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Loi And Eligibility Receipts',
);

$this->menu=array(
	array('label'=>'Create LoiAndEligibilityReceipt', 'url'=>array('create')),
	array('label'=>'Manage LoiAndEligibilityReceipt', 'url'=>array('admin')),
);
?>

<h1>Loi And Eligibility Receipts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
