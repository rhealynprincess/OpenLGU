<?php
/* @var $this BidEvaluationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bid Evaluations',
);

$this->menu=array(
	array('label'=>'Create BidEvaluation', 'url'=>array('create')),
	array('label'=>'Manage BidEvaluation', 'url'=>array('admin')),
);
?>

<h1>Bid Evaluations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
