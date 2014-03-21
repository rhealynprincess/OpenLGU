<?php
/* @var $this IssuanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Issuances',
);

$this->menu=array(
	array('label'=>'Create Issuance', 'url'=>array('create')),
	array('label'=>'Manage Issuance', 'url'=>array('admin')),
);
?>

<h1>Issuances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
