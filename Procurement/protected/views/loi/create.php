<?php
/* @var $this LoiController */
/* @var $model Loi */

$this->breadcrumbs=array(
	'Lois'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Loi', 'url'=>array('index')),
	array('label'=>'Manage Loi', 'url'=>array('admin')),
);
?>

<h1>Create Loi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>