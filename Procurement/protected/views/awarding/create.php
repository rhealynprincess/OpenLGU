<?php
/* @var $this AwardingController */
/* @var $model Awarding */

$this->breadcrumbs=array(
	'Awardings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Awarding', 'url'=>array('index')),
	array('label'=>'Manage Awarding', 'url'=>array('admin')),
);
?>

<h1>Create Awarding</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>