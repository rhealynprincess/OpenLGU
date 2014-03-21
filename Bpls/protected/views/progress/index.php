<?php
/* @var $this ProgressController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Progresses',
);

$this->menu=array(
	array('label'=>'Create Progress', 'url'=>array('create')),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<h1>Progresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
