<?php
/* @var $this UserTableController */
/* @var $model UserTable */

$this->breadcrumbs=array(
	'User Tables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserTable', 'url'=>array('index')),
	array('label'=>'Manage UserTable', 'url'=>array('admin')),
);
?>

<h1>Create UserTable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
