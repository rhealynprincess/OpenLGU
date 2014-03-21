<?php
/* @var $this UserTableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Tables',
);

$this->menu=array(
	array('label'=>'Create UserTable', 'url'=>array('create')),
	array('label'=>'Manage UserTable', 'url'=>array('admin')),
);
?>

<h1>User Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
