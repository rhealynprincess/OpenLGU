<?php
/* @var $this UserTableController */
/* @var $model UserTable */

$this->breadcrumbs=array(
	'User Tables'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserTable', 'url'=>array('index')),
	array('label'=>'Create UserTable', 'url'=>array('create')),
	array('label'=>'View UserTable', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Manage UserTable', 'url'=>array('admin')),
);
?>

<h1>Update UserTable <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>