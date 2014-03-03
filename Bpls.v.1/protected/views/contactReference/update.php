<?php
/* @var $this ContactReferenceController */
/* @var $model ContactReference */

/* ADMIN */
if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Taxpayers'=>array('taxpayer/admin'),
		$model->email=>array('taxpayer/view','id'=>$model->user_id),
		'Contact References'=>array('contactReference/view', 'id'=>$model->user_id),
		'Update Contact References',
	);
}

/* REGISTERED */
if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Profile'=>array('taxpayer/profile'),
		'My Contact References'=>array('contactReference/view', 'id'=>$model->user_id),
		'Update My Contact Reference',
	);
}

?>


<?php echo $this->renderPartial('_updateForm', array('model'=>$model, 'crfModel'=>$crfModel)); ?>
