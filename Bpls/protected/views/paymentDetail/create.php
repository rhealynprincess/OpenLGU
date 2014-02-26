<?php
/* @var $this PaymentDetailController */
/* @var $model PaymentDetail */

$this->breadcrumbs=array(
		'Businesses'=>array('paymentHolder/admin'),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business->business_id),
		'Payment Schedule' => array('payMode/index', 'id'=>$payMode->payment_holder_id),
		$payMode->name => array('payMode/view', 'id'=>$payMode->pay_mode_id),
		'Create Payment Record',
		
	);

?>

<h3 style="text-align:center"><b>Create Payment Detail</b></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
