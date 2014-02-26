<?php
/* @var $this EmergencyContactController */
/* @var $model EmergencyContact */

if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
			'My Profile'=>array('taxpayer/profile', 'id'=>$model->user_id),
			'Emergency Contact Reference',
	);

	$this->menu=array(
		array('label'=>'Update Emergency Contact', 'url'=>array('update', 'id'=>$model->emergency_id)),
	);
} elseif(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
			'Taxpayers'=>array('taxpayer/admin'),
			$model->user->email => array('taxpayer/view', 'id'=>$model->user->user_id),
			'Emergency Contact Reference',
	);

	$this->menu=array(
		array('label'=>'Update Emergency Contact', 'url'=>array('update', 'id'=>$model->emergency_id)),
	);
}
?>

<h3 style="text-align:center"><b>Emergency Contact Reference</b></h3>
<div class="view">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'full_name',
		'contact_num',
		'contact_email',
		'contact_relationship',
	),
)); ?>
</div>
