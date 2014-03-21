<?php
/* @var $this EmergencyContactController */
/* @var $model EmergencyContact */

/* ADMIN */
if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Taxpayers'=>array('taxpayer/admin'),
		$model->email=>array('taxpayer/view','id'=>$model->user_id),
		'Emergency Contact Reference' => array('view', 'id'=>$model->emergencyContact->emergency_id),
		'Edit Emergency Contact',
	);
}

/* REGISTERED */
if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Profile'=>array('taxpayer/profile'),
		'Emergency Contact'=>array('emergencyContact/view', 'id'=>$model->emergencyContact->emergency_id),
		'Update Emergency Contact',
	);
}

?>


<?php echo $this->renderPartial('_updateForm', array('model'=>$model, 'emcModel'=>$emcModel)); ?>

