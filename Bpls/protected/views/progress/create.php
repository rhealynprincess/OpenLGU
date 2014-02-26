<?php
/* @var $this ProgressController */
/* @var $model Progress */

$this->breadcrumbs=array(
	'Progresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Progress', 'url'=>array('index')),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<h1>Create Progress</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>