<?php
/* @var $this BusinessController */
/* @var $model Business */

$this->breadcrumbs=array(
	'Businesses'=>array('index'),
	$model->name=>array('view','id'=>$model->business_id),
	'Update',
);

?>

<h3 style="text-align:center"><b><?php echo $model->name.' - Update'; ?></b></h3>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
