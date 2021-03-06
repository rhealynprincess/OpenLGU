<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Admins',
);
*/
$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
	array('label'=>'List Projects and Programs', 'url'=>array('ProjectImplementor/index')),
	array('label'=>'List Contractors', 'url'=>array('Contractor/index')),
	array('label'=>'Approve Comments', 'url'=>array('Comment/index')),
);
?>

<h1>Users</h1>

<!--<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>-->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
		'first_name',
		'middle_name',
		'last_name',
		'username',
		//'password',
		'sector',
		'user_role',
		/*
		array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
