<?php
/* @var $this ShortlistController */
/* @var $model Shortlist */

$this->breadcrumbs=array(
	'Shortlists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Shortlist', 'url'=>array('index')),
	array('label'=>'Manage Shortlist', 'url'=>array('admin')),
);
?>

<h1>Create Shortlist</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>