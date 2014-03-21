<?php
/* @var $this ProjectImplementorController */
/* @var $model ProjectImplementor */

/*$this->breadcrumbs=array(
	'Project Implementors'=>array('index'),
	$model->project_program_no=>array('view','id'=>$model->project_program_no),
	'Update',
);
*/
if(Yii::app()->user->getState("user_role")=="admin"){
	$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('Admin/index')),
'links' => array(
			"Update",
		),
));
$this->menu=array(
	array('label'=>'List Projects and Programs', 'url'=>array('index')),
	array('label'=>'Create Project/Program', 'url'=>array('create')),
	array('label'=>'View Project/Program', 'url'=>array('view', 'id'=>$model->project_program_no)),
	array('label'=>'Manage Project/Program', 'url'=>array('admin')),
);
}
?>

<h1>Update Project/Program <?php echo $model->project_program_no; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
