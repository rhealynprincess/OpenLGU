<?php
/* @var $this ContractorController */
/* @var $model Contractor */
/*
$this->breadcrumbs=array(
	'Contractors'=>array('index'),
	'Create',
);
*/

$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('List Contractors', array('Contractor/index')),
'links' => array(
			"Create ",
		),
));



$this->menu=array(
	array('label'=>'List Contractor', 'url'=>array('index')),
	array('label'=>'Manage Contractor', 'url'=>array('admin')),
);
?>

<h1>Create Contractor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
