<?php
/* @var $this PaymentDetailController */
/* @var $model PaymentDetail */

$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->payMode->paymentHolder->busAcctHolder->business->name=>array('business/view', 'id'=>$model->payMode->paymentHolder->busAcctHolder->business->business_id),
		'Payment Schedule' => array('payMode/index', 'id'=>$model->payMode->payment_holder_id),
		$model->payMode->name => array('payMode/view', 'id'=>$model->payMode->pay_mode_id),
		'Payment Detail' => array('view', 'id'=>$model->payment_detail_id),
		'Edit Payment Detail',
	);

?>

<h3 style="text-align:center"><b>Update Payment Detail</b></h3>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
