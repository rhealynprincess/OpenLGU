<?php
/* @var $this NtpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ntps',
);

$this->menu=array(
	array('label'=>'Create Ntp', 'url'=>array('create')),
	array('label'=>'Manage Ntp', 'url'=>array('admin')),
);
?>

<h1>Ntps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
