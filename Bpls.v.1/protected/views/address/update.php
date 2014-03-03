<?php
/* @var $this AddressController */
/* @var $model Address */

/* ADMIN */
if(Yii::app()->user->role =='ADMIN')
{
	$this->breadcrumbs=array(
		'Taxpayer'=>array('taxpayer/admin'),
		$model->email=>array('taxpayer/view','id'=>$model->user_id),
		'Addresses'=>array('address/view', 'id'=>$model->user_id),
		'Update Address',
	);
}

/* REGISTERED */
if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Profile'=>array('taxpayer/profile', 'id'=>$model->user_id),
		'My Addresses'=>array('address/view', 'id'=>$model->user_id),
		'Update Address',
	);
}

?>


<?php echo $this->renderPartial('_updateForm', array('model'=>$model, 'adrModel'=>$adrModel)); ?>
