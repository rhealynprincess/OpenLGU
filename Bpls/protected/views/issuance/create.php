<?php
/* @var $this IssuanceController */
/* @var $model Issuance */

$this->breadcrumbs=array(
	'Businesses'=> array('business/admin'),
	$model->approval->busAcctHolder->business->name => array('business/view', 'id'=>$model->approval->busAcctHolder->business->business_id),
	'Approvals' => array('approval/index', 'id'=>$model->approval->account_holder_id),
	$model->approval->sys_entry_date.' - Approval' => array('approval/view', 'id'=>$model->approval->approval_id),
	'Create Issuance',
);
?>

<h3 style="text-align:center"><b>Create Issuance</b></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
