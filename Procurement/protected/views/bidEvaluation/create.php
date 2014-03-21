<?php
/* @var $this BidEvaluationController */
/* @var $model BidEvaluation */

$this->breadcrumbs=array(
	'Bid Evaluations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BidEvaluation', 'url'=>array('index')),
	array('label'=>'Manage BidEvaluation', 'url'=>array('admin')),
);
?>

<h1>Create BidEvaluation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>