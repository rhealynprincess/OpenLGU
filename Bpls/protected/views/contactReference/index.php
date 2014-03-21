<?php
/* @var $this ContactReferenceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contact References',
);

$this->menu=array(
	array('label'=>'Create ContactReference', 'url'=>array('create')),
	array('label'=>'Manage ContactReference', 'url'=>array('admin')),
);
?>

<h1>Contact References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
