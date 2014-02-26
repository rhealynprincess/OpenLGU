<?php
/* @var $this UserTableController */
/* @var $model UserTable */

$this->breadcrumbs=array(
	'User Tables'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List UserTable', 'url'=>array('index')),
	array('label'=>'Create UserTable', 'url'=>array('create')),
	array('label'=>'Update UserTable', 'url'=>array('update', 'id'=>$model->username)),
	array('label'=>'Delete UserTable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserTable', 'url'=>array('admin')),
);
?>

<h1>View UserTable #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'first_name',
		'middle_name',
		'last_name',
		'username',
		'password',
		'sector',
		'user_role',
	),
)); ?>
