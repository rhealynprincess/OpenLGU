<?php
/* @var $this ShortlistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shortlists',
);

$this->menu=array(
	array('label'=>'Create Shortlist', 'url'=>array('create')),
	array('label'=>'Manage Shortlist', 'url'=>array('admin')),
);
?>

<h1>Shortlists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
