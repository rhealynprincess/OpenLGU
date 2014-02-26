<?php
/* @var $this MayorController */
/* @var $model Mayor */

$this->breadcrumbs=array(
	'Mayors'=>array('index'),
	$model->project_program_no=>array('view','id'=>$model->project_program_no),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mayor', 'url'=>array('index')),
	array('label'=>'Create Mayor', 'url'=>array('create')),
	array('label'=>'View Mayor', 'url'=>array('view', 'id'=>$model->project_program_no)),
	array('label'=>'Manage Mayor', 'url'=>array('admin')),
);
?>

<h1>Update Mayor <?php echo $model->project_program_no; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
