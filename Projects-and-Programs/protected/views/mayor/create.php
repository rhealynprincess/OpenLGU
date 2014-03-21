<?php
/* @var $this MayorController */
/* @var $model Mayor */

$this->breadcrumbs=array(
	'Mayors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mayor', 'url'=>array('index')),
	array('label'=>'Manage Mayor', 'url'=>array('admin')),
);
?>

<h1>Create Mayor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>