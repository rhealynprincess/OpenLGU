<?php
/* @var $this ApprovalController */
/* @var $model Approval */

$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->busAcctHolder->business->name => array('business/view', 'id'=>$model->busAcctHolder->business->business_id),
		$model->sys_entry_date.' - Approval' => array('view', 'id'=>$model->approval_id),
		'Edit Approval',
	);


?>

<h3 style="text-align:center"><b>Edit <?php echo $model->sys_entry_date." - Approval"; ?></b></h3>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
