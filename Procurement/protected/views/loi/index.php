<?php
/* @var $this LoiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lois',
);

$this->menu=array(
	array('label'=>'Create Loi', 'url'=>array('create')),
	array('label'=>'Manage Loi', 'url'=>array('admin')),
);
?>

<h1>Lois</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
