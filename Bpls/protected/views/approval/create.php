<?php
/* @var $this ApprovalController */
/* @var $model Approval */

$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->busAcctHolder->business->name => array('business/view', 'id'=>$model->busAcctHolder->business->business_id),
		'Create Approval',
	);

?>

<h3 style="text-align:center"><b>Create Approval</b></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
