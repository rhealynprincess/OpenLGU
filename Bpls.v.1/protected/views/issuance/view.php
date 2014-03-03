<?php
/* @var $this IssuanceController */
/* @var $model Issuance */

$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->approval->busAcctHolder->business->name => array('business/view', 'id'=>$model->approval->busAcctHolder->business->business_id),
		$model->approval->sys_entry_date.' - Approval'=> array('approval/view', 'id'=>$model->approval_id),
		'Issuance',
	);

	
	if(Yii::app()->user->role == 'LCE' || Yii::app()->user->role == 'ADMIN')
	{
		$this->menu=array(
			array('label'=>'Edit Issuance', 'url'=>array('update', 'id'=>$model->issuance_id)),
			array('label'=>'View Business Permit', 'url'=>array('issue', 'id'=>$model->issuance_id)),
		);
		
	}else
	{
		$this->menu=array(
			array('label'=>'View Business Permit', 'url'=>array('issue', 'id'=>$model->issuance_id)),
		);
	}
	
	
	

?>

<h3 style="text-align:center"><b>Issuance</b></h3>
<div class="view">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'business_reg_num',
		'full_business_name',
		'or_reference',
		'or_reference_date',
		'released_to',
		'scheduled_release_date',
		'actual_release_date',
	),
)); ?>
</div>
