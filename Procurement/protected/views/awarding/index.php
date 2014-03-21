<?php
/* @var $this AwardingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Awardings',
);

$this->menu=array(
	array('label'=>'Create Awarding', 'url'=>array('create')),
	array('label'=>'Manage Awarding', 'url'=>array('admin')),
);
?>

<h1>Awardings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
