<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */
/* REGISTERED USER VIEW ONLY */

$this->breadcrumbs=array(
	'My Profile',
);

$this->menu=array(
	//array('label'=>'Update Basic Information', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'My Addresses', 'url'=>array('address/view', 'id'=>$model->user_id)),
	array('label'=>'My Contact References', 'url'=>array('contactReference/view', 'id'=>$model->user_id)),
	array('label'=>'Emergency Contact', 'url'=>array('emergencyContact/view', 'id'=>$model->emergencyContact->emergency_id)),
	array('label'=>'Change Password', 'url'=>array('changePassword', 'id'=>$model->user_id)),
);
?>

<h3 style="text-align:center"><b><?php echo $model->email; ?></b></h3>


<!-- BASIC INFORMATION -->
<div class="view">
<h5 style="text-align:center">Basic Information</h5>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'username',
		'role',
		'full_name',
		'dob_full',
		'civil_status',
		'gender',
		'tin',
	),
)); ?>
</div>


<!-- ADDRESS -->
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


<!-- CONTACT REFERENCE -->
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



<!-- EMERGENCY CONTACT DETAILS -->
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
