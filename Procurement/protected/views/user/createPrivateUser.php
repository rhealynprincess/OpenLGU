<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create Private User',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	//array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create Bidder</h1>

<?php echo $this->renderPartial('_formPrivate', array('model'=>$model,'model2'=>$model2,'model3'=>$model3,'error'=>$error)); ?>
