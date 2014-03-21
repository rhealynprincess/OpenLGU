<?php
/* @var $this ProgressController */
/* @var $model Progress */

if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
			'My Businesses'=>array('business/index', 'id'=>$model->busAcctHolder->business->user_id),
			$model->busAcctHolder->business->name => array('business/view', 'id'=>$model->busAcctHolder->business_id),
			'Overall Progress',
	);
} elseif(Yii::app()->user->role == 'BPLO' || Yii::app()->user->role == 'ASSESSOR' || Yii::app()->user->role == 'TREASURY' || Yii::app()->user->role == 'LCE')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->busAcctHolder->business->name => array('business/view', 'id'=>$model->busAcctHolder->business_id),
		'Overall Progress',
	);
} elseif(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->busAcctHolder->business->name => array('business/view', 'id'=>$model->busAcctHolder->business_id),
		'Overall Progress',
	);
}

?>

<h4 style="text-align:center"><b><?php echo $model->busAcctHolder->business->name.' - Overall Progress'; ?></b></h4>
<div class="view">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'business_information',
		'documents',
		'assessment',
		'payment',
		'approval',
	),
)); ?>
</div>
