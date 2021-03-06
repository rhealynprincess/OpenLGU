<?php
/* @var $this PayModeController */
/* @var $model PayMode */

$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->paymentHolder->busAcctHolder->business->name=>array('business/view', 'id'=>$model->paymentHolder->busAcctHolder->business->business_id),
		'Payment Schedule' => array('payMode/index', 'id'=>$model->payment_holder_id),
		$model->name  => array('payMode/view', 'id'=>$model->pay_mode_id),
		'Set Due Date and Amount Due',
	);

?>

<h3 style="text-align:center"><b><?php echo $model->paymentHolder->busAcctHolder->business->name; ?></b></h3>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
