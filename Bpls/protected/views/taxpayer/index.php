<?php
/* @var $this TaxpayerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Taxpayers',
);

$this->menu=array(
	array('label'=>'Create Taxpayer', 'url'=>array('create')),
	array('label'=>'Manage Taxpayer', 'url'=>array('admin')),
);
?>

<h1>Taxpayers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
