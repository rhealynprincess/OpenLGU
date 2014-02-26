<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */

//ADMIN
if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Taxpayers'=>array('admin'),
		$model->email,
	);

	$this->menu=array(
		array('label'=>'View Businesses', 'url'=>array('business/index', 'id'=>$model->user_id)),
		array('label'=>'Update Basic Information', 'url'=>array('update', 'id'=>$model->user_id)),
		array('label'=>'Addresses', 'url'=>array('address/view', 'id'=>$model->user_id)),
		array('label'=>'Contact References', 'url'=>array('contactReference/view', 'id'=>$model->user_id)),
		array('label'=>'Emergency Contact', 'url'=>array('emergencyContact/view', 'id'=>$model->emergencyContact->emergency_id)),
		array('label'=>'Change Password', 'url'=>array('changePassword', 'id'=>$model->user_id)),
		array('label'=>'Delete Taxpayer Data', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
} elseif(Yii::app()->user->role == 'BPLO' || Yii::app()->user->role == 'ASSESSOR' || Yii::app()->user->role == 'TREASURY' || Yii::app()->user->role == 'LCE')
{
	$this->breadcrumbs=array(
		'Businesses' => array('business/admin'),
		$busModel->name => array('business/view', 'id'=>$busModel->business_id),
		'Taxpayer Profile',
	);
}

?>

<h3 style="text-align:center"><b><?php echo $model->email; ?></b></h3>
<div class="view">
<h5 style="text-align:center">Basic Information</h5>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'role',
		'full_name',
		'dob_full',
		'civil_status',
		'gender',
		'tin',
		'sys_entry_date',
	),
)); ?>
</div>


<div class="view">
<h5 style="text-align:center">Address</h5>
<?php foreach($adrModel as $trial){ ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$trial,
	'attributes'=>array(
		'full_address',
	),
)); ?>
<?php } ?>
</div>


<div class="view">
<h5 style="text-align:center">Contact Reference</h5>
<?php foreach($crfModel as $index){ ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$index,
	'attributes'=>array(
		'detail',
		
	),
)); ?>
<?php } ?>
</div>



<div class="view">
<h5 style="text-align:center">Emergency Contact Details</h5>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$emcModel,
	'attributes'=>array(
		'full_name',
		'contact_relationship',
		'contact_num',
		'contact_email',
	),
)); ?>
</div>
