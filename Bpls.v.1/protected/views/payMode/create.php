<?php
/* @var $this PayModeController */
/* @var $model PayMode */

$this->breadcrumbs=array(
	'Pay Modes'=>array('index'),
	'Create',
);

?>

<h1>Create PayMode</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
