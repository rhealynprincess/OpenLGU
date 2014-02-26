<?php
/* @var $this AdminController */
/* @var $model Admin */

/*$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Create',
);
*/
$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('Admin/index')),
'links' => array(
			"Create",
		),
));


$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
