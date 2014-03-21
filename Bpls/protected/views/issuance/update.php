<?php
/* @var $this IssuanceController */
/* @var $model Issuance */

$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->approval->busAcctHolder->business->name => array('business/view', 'id'=>$model->approval->busAcctHolder->business->business_id),
		$model->approval->sys_entry_date.' - Approval'=> array('approval/view', 'id'=>$model->approval_id),
		'Issuance' => array('view', 'id'=>$model->issuance_id),
		'Edit Issuance',
	);


?>

<h3 style="text-align:center"><b>Edit Issuance</b></h3>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
