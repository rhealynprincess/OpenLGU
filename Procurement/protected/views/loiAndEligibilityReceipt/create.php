<?php
/* @var $this LoiAndEligibilityReceiptController */
/* @var $model LoiAndEligibilityReceipt */

$this->breadcrumbs=array(
	'Loi And Eligibility Receipts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LoiAndEligibilityReceipt', 'url'=>array('index')),
	array('label'=>'Manage LoiAndEligibilityReceipt', 'url'=>array('admin')),
);
?>

<h1>Create LoiAndEligibilityReceipt</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>