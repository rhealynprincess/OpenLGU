<?php
/* @var $this ProjectProgramController */
/* @var $model ProjectProgram */

$this->breadcrumbs=array(
	'Project Programs'=>array('index'),
	$model->project_program_no=>array('view','id'=>$model->project_program_no),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectProgram', 'url'=>array('index')),
	array('label'=>'Create ProjectProgram', 'url'=>array('create')),
	array('label'=>'View ProjectProgram', 'url'=>array('view', 'id'=>$model->project_program_no)),
	array('label'=>'Manage ProjectProgram', 'url'=>array('admin')),
);
?>

<h1>Update ProjectProgram <?php echo $model->project_program_no; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>