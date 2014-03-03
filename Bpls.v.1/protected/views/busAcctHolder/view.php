<?php
/* @var $this BusAcctHolderController */
/* @var $model BusAcctHolder */

$this->breadcrumbs=array(
	'My Businesses' => array('business/index', 'id'=>$model->business->user->user_id),
	$model->business->name => array('business/view', 'id'=>$model->business_id),
	'Previous Records' => array('busAcctHolder/index', 'id'=>$model->business_id),
	'Business Record - '.$model->application_date,
);

$this->menu=array(
	array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$model->account_holder_id)),
	array('label'=>'Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$model->busAcctDetail->account_detail_id)),
	array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$model->paymentHolder->payment_holder_id)),
	array('label'=>'Approval', 'url'=>array('approval/view', 'id'=>$model->approval->approval_id)),
);

?>

<h3 style="text-align:center"><b>Business Account Record - <?php echo $model->application_date; ?></b></h3>
<div class="view">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'application_date',
		'business.name',
		'business.user.full_name',
	),
)); ?>
</div>
