<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create Government User',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	//array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create Government User</h1>

<?php echo $this->renderPartial('_formGov', array('model'=>$model,'error'=>$error)); ?>
