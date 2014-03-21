<?php
/* @var $this PaymentDetailController */
/* @var $model PaymentDetail */
if(Yii::app()->user->role == 'TREASURY')
{
	$this->breadcrumbs=array(
		'Business'=>array('business/admin'),
		$acctHolder->business->name=>array('business/view', 'id'=>$acctHolder->business_id),
		'Payments' => array('payMode/index', 'id'=>$payMode->payment_holder_id),
		$payMode->name => array('payMode/view', 'id'=>$payMode->pay_mode_id),
		'Payment Detail',
	);
	
	$this->menu=array(
		array('label'=>'Update Payment', 'url'=>array('paymentDetail/update', 'id'=>$model->payment_detail_id)),
	);	
	
} elseif(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Businesses'=>array('business/index', 'id'=>$acctHolder->user_id),
		$acctHolder->business->name=>array('business/view', 'id'=>$acctHolder->business_id),
		'Payments' => array('payMode/index', 'id'=>$payMode->payment_holder_id),
		'Payment Detail',
	);
}
if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->payMode->paymentHolder->busAcctHolder->business->name=>array('business/view', 'id'=>$model->payMode->paymentHolder->busAcctHolder->business->business_id),
		'Payment Schedule' => array('payMode/index', 'id'=>$model->payMode->payment_holder_id),
		$model->payMode->name => array('payMode/view', 'id'=>$model->payMode->pay_mode_id),
		'Payment Detail',
	);

	$this->menu=array(
		array('label'=>'Update Payment', 'url'=>array('paymentDetail/update', 'id'=>$model->payment_detail_id)),
	);	
}


?>

<h3 style="text-align:center"><b>Payment Detail: <?php echo $acctHolder->business->name; ?> - <?php echo $payMode->name; ?></b></h3>
<div class="view">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'or_num',
		'pay_mode',
		'capital_amount',
		'gross_sales_tax',
		'gross_sales_tax_amt',
		'gross_sales_tax_pnl',
		'transport_truck_tax',
		'transport_truck_tax_amt',
		'transport_truck_tax_pnl',
		'hazard_storage_tax',
		'hazard_storage_tax_amt',
		'hazard_storage_tax_pnl',
		'sign_billboard_tax',
		'sign_billboard_tax_amt',
		'sign_billboard_tax_pnl',
		'mayors_permit_fee',
		'mayors_permit_fee_amt',
		'mayors_permit_fee_pnl',
		'garbage_fee',
		'garbage_fee_amt',
		'garbage_fee_pnl',
		'truck_van_permit_fee',
		'truck_van_permit_fee_amt',
		'truck_van_permit_fee_pnl',
		'sanitary_permit_fee',
		'sanitary_permit_fee_amt',
		'sanitary_permit_fee_pnl',
		'bldg_insp_fee',
		'bldg_insp_fee_amt',
		'bldg_insp_fee_pnl',
		'elec_insp_fee',
		'elec_insp_fee_amt',
		'elec_insp_fee_pnl',
		'mech_insp_fee',
		'mech_insp_fee_amt',
		'mech_insp_fee_pnl',
		'plumb_insp_fee',
		'plumb_insp_fee_amt',
		'plumb_insp_fee_pnl',
		'sign_billboard_fee',
		'sign_billboard_fee_amt',
		'sign_billboard_fee_pnl',
		'sign_billboard_renew_fee',
		'sign_billboard_renew_fee_amt',
		'sign_billboard_renew_fee_pnl',
		'hazard_storage_fee',
		'hazard_storage_fee_amt',
		'hazard_storage_fee_pnl',
		'bfp_fee',
		'bfp_fee_amt',
		'bfp_fee_pnl',
	),
)); ?>

</div>
