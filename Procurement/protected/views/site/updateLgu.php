<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'LGU'=>array('lgu'),
	'Update',
);

$this->menu=array(
);
?>

<h1>Update LGU Profile</h1>

<?php echo $this->renderPartial('_formLgu',array('model'=>$model,'model2'=>$model2,'model3'=>$model3,'error'=>$error)); ?>