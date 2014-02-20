<?php
/* @var $this LoiController */
/* @var $model Loi */

$this->breadcrumbs=array(
	'Lois'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Loi', 'url'=>array('index')),
	array('label'=>'Create Loi', 'url'=>array('create')),
	array('label'=>'View Loi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Loi', 'url'=>array('admin')),
);
?>

<h1>Update Loi <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>