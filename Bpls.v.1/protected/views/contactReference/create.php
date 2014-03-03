<?php
/* @var $this ContactReferenceController */
/* @var $model ContactReference */

/* ADMIN */
if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Taxpayers'=>array('taxpayer/admin'),
		$model->email => array('taxpayer/view', 'id'=>$model->user_id),
		'Contact References' => array('view', 'id'=>$model->user_id),
		'Add new Contact Reference',
	);
}

/* REGISTERED */
if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Profile'=>array('taxpayer/profile'),
		'My Contact References' => array('view', 'id'=>$model->user_id),
		'Add new Contact Reference',
	);
}

?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'crfModel'=>$crfModel)); ?>
