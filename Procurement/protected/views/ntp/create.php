<?php
/* @var $this NtpController */
/* @var $model Ntp */

$this->breadcrumbs=array(
	'Ntps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ntp', 'url'=>array('index')),
	array('label'=>'Manage Ntp', 'url'=>array('admin')),
);
?>

<h1>Create Ntp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>