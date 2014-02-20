<?php
/* @var $this EligibilityCheckController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Eligibility Checks',
);

$this->menu=array(
	array('label'=>'Create EligibilityCheck', 'url'=>array('create')),
	array('label'=>'Manage EligibilityCheck', 'url'=>array('admin')),
);
?>

<h1>Eligibility Checks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
