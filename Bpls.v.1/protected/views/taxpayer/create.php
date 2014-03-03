<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */

$this->breadcrumbs=array(
	'Taxpayers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Taxpayer', 'url'=>array('index')),
	array('label'=>'Manage Taxpayer', 'url'=>array('admin')),
);
?>

<h1>Create Taxpayer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'adrModel'=>$adrModel, 'crfModel'=>$crfModel, 'emcModel'=>$emcModel)); ?>
