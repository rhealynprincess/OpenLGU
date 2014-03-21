<?php
/* @var $this AddressController */
/* @var $model Address */

/* ADMIN */
if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Taxpayers'=>array('taxpayer/admin'),
		$model->email => array('taxpayer/view', 'id'=>$model->user_id),
		'Addresses' => array('view', 'id'=>$model->user_id),
		'Add new Address',
	);
}

/* REGISTERED */
if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Profile'=>array('taxpayer/profile'),
		'My Addresses' => array('view', 'id'=>$model->user_id),
		'Add new Address',
	);
}

$this->menu=array(
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'adrModel'=>$adrModel)); ?>
