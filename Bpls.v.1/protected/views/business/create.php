<?php
/* @var $this BusinessController */
/* @var $model Business */

if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Businesses'=>array('index', 'id'=>Yii::app()->user->id),
		'Register a Business',
	);

	$this->menu=array(

	);
}

if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('admin'),
		'Register a Business',
	);

	$this->menu=array(

	);
}
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
