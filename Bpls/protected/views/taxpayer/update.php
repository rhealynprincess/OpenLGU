<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */

/* ADMIN */
	if(Yii::app()->user->role =='ADMIN')
	{
	$this->breadcrumbs=array(
		'Taxpayers'=>array('admin'),
		$model->email=>array('view','id'=>$model->user_id),
		'Update Basic Information',
);
}

/* REGISTERED */
if(Yii::app()->user->role =='REGISTERED')
{
$this->breadcrumbs=array(
	'My Profile'=>array('profile'),
	'Update Basic Information',
);
}

?>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
