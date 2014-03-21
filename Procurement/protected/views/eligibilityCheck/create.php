<?php
/* @var $this EligibilityCheckController */
/* @var $model EligibilityCheck */

$this->breadcrumbs=array(
	'Eligibility Checks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EligibilityCheck', 'url'=>array('index')),
	array('label'=>'Manage EligibilityCheck', 'url'=>array('admin')),
);
?>

<h1>Create EligibilityCheck</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>