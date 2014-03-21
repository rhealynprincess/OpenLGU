<?php
/* @var $this ShortlistController */
/* @var $model Shortlist */

$this->breadcrumbs=array(
	'Shortlists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Shortlist', 'url'=>array('index')),
	array('label'=>'Create Shortlist', 'url'=>array('create')),
	array('label'=>'View Shortlist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Shortlist', 'url'=>array('admin')),
);
?>

<h1>Update Shortlist</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>