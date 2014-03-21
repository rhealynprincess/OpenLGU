<?php
/* @var $this PostQualificationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Post Qualifications',
);

$this->menu=array(
	array('label'=>'Create PostQualification', 'url'=>array('create')),
	array('label'=>'Manage PostQualification', 'url'=>array('admin')),
);
?>

<h1>Post Qualifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
