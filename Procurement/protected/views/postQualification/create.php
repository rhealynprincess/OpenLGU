<?php
/* @var $this PostQualificationController */
/* @var $model PostQualification */

$this->breadcrumbs=array(
	'Post Qualifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PostQualification', 'url'=>array('index')),
	array('label'=>'Manage PostQualification', 'url'=>array('admin')),
);
?>

<h1>Create PostQualification</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>