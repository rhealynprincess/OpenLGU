<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);*/

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
	array('label'=>'List Projects and Programs', 'url'=>array('ProjectImplementor/index')),
	array('label'=>'List Contractors', 'url'=>array('Contractor/index')),
//	array('label'=>'List Comments', 'url'=>array('Comment/index')),
);
?>

<h1>Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
