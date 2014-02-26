<?php
/* @var $this ContractorController */
/* @var $model Contractor */
/*
$this->breadcrumbs=array(
	'Contractors'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);*/

$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('List Contractors', array('Contractor/index')),
'links' => array(
			$model->name=>array('view', 'id'=>$model->name),
			'Update',		
		),
));


$this->menu=array(
	array('label'=>'List Contractor', 'url'=>array('index')),
	array('label'=>'Create Contractor', 'url'=>array('create')),
	array('label'=>'View Contractor', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage Contractor', 'url'=>array('admin')),
);
?>

<h1>Update Contractor <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
