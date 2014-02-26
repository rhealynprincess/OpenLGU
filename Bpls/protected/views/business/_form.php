<?php
/* @var $this BusinessController */
/* @var $model Business */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('orgType', "
$('#orgType').change(function(){
	if($('#orgType').val() == 'Single')
	{
		$('#dti').show();
		$('#dtiField').addClass('required');
		$('#cda').hide();
		$('#sec').hide();

	}
	if(($('#orgType').val() == 'Partnership') || ($('#orgType').val() == 'Corporation'))
	{
		$('#sec').show();
		$('#secField').addClass('required');
		$('#dti').hide();
		$('#cda').hide();
	}
	if($('#orgType').val() == 'Cooperative')
	{
		$('#cda').show();
		$('#cdaField').addClass('required');
		$('#dti').hide();
		$('#sec').hide();
	}
	return false;
});

$('#hasLessor').change(function(){
	if($('#hasLessor').val() == 'Yes')
	{
		$('#lessorId').show();
	}
	if($('#hasLessor').val() == 'No')
	{
		$('#lessorId').hide();
	}

	return false;
});

");







?>




<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>

	<?php echo $form->errorSummary($model); ?>
<div class="view">
	<h4 style="text-align:center"><b>Register a Business</b></h4>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php if(Yii::app()->user->role == 'ADMIN'){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
<?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trade_name'); ?>
		<?php echo $form->textField($model,'trade_name'); ?>
		<?php echo $form->error($model,'trade_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'president_name'); ?>
		<?php echo $form->textField($model,'president_name'); ?>
		<?php echo $form->error($model,'president_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'org_type'); ?>
		<?php echo $form->dropDownList($model,'org_type', $model::getOrgType(), array('prompt'=>'', 'id'=>'orgType')); ?>
		<?php echo $form->error($model,'org_type'); ?>
	</div>


<?php if(isset($_POST['Business'])):?>
<?php $bussiness = $_POST['Business']?>
<?php endif;?>

<?php if(isset($bussiness['org_type']) && $bussiness['org_type'] == 'Single'): ?>
<div class="row" id="dti">
<?php else:?>
<div class="row" id="dti" style="display:none;">
<?php endif;?>
<?php echo $form->labelEx($model,'dti_ref'); ?>
<?php echo $form->textField($model,'dti_ref', array('id'=>'dtiField')); ?>
<?php echo $form->error($model,'dti_ref'); ?>
</div>


<?php if(isset($_POST['Business'])):?>
<?php $bussiness = $_POST['Business']?>
<?php endif;?>

<?php if((isset($bussiness['org_type']) && $bussiness['org_type'] == 'Partnership') || (isset($bussiness['org_type']) && $bussiness['org_type'] == 'Corporation')): ?>
<div class="row" id="sec">
<?php else:?>
<div class="row" id="sec" style="display:none;">
<?php endif;?>
<?php echo $form->labelEx($model,'sec_ref'); ?>
<?php echo $form->textField($model,'sec_ref', array('id'=>'secField')); ?>
<?php echo $form->error($model,'sec_ref'); ?>
</div>


<?php if(isset($_POST['Business'])):?>
<?php $bussiness = $_POST['Business']?>
<?php endif;?>

<?php if(isset($bussiness['org_type']) && $bussiness['org_type'] == 'Cooperative'): ?>
<div class="row" id="cda">
<?php else:?>
<div class="row" id="cda" style="display:none;">
<?php endif;?>
<?php echo $form->labelEx($model,'cda_ref'); ?>
<?php echo $form->textField($model,'cda_ref', array('id'=>'cdaField')); ?>
<?php echo $form->error($model,'cda_ref'); ?>
</div>



	<div class="row">
		<?php echo $form->labelEx($model,'ein'); ?>
		<?php echo $form->textField($model,'ein'); ?>
		<?php echo $form->error($model,'ein'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tin'); ?>
		<?php echo $form->textField($model,'tin'); ?>
		<?php echo $form->error($model,'tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lob_desc'); ?>
		<?php echo $form->dropDownList($model, 'lob_desc', CHtml::listData(Lob::model()->findAll(), 'description', 'description'), array('prompt' => 'Select Line of Business')); ?>
		<?php echo $form->error($model,'lob_desc'); ?>
		
	</div>
	


	<div class="row">
		<?php echo $form->labelEx($model,'capital_amount'); ?>
		<?php echo $form->textField($model,'capital_amount'); ?>
		<?php echo $form->error($model,'capital_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_num'); ?>
		<?php echo $form->textField($model,'tel_num'); ?>
		<?php echo $form->error($model,'tel_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website_url'); ?>
		<?php echo $form->textField($model,'website_url'); ?>
		<?php echo $form->error($model,'website_url'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'tax_payment_type'); ?>
		<?php echo $form->textField($model,'tax_payment_type'); ?>
		<?php echo $form->error($model,'tax_payment_type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pay_mode'); ?>
		<?php echo $form->dropDownList($model,'pay_mode', $model::getPaymentType(), array('prompt'=>'')); ?>
		<?php echo $form->error($model,'pay_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bldg_num'); ?>
		<?php echo $form->textField($model,'bldg_num'); ?>
		<?php echo $form->error($model,'bldg_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bldg_name'); ?>
		<?php echo $form->textField($model,'bldg_name'); ?>
		<?php echo $form->error($model,'bldg_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_num'); ?>
		<?php echo $form->textField($model,'unit_num'); ?>
		<?php echo $form->error($model,'unit_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street'); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subdivision'); ?>
		<?php echo $form->textField($model,'subdivision'); ?>
		<?php echo $form->error($model,'subdivision'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'barangay'); ?>
		<?php echo $form->textField($model,'barangay'); ?>
		<?php echo $form->error($model,'barangay'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'postal_code'); ?>
		<?php echo $form->textField($model,'postal_code'); ?>
		<?php echo $form->error($model,'postal_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_lessor'); ?>
		<?php echo $form->dropDownList($model,'has_lessor', $model::hasLessor(), array('prompt'=>'', 'id'=>'hasLessor')); ?>
		<?php echo $form->error($model,'has_lessor'); ?>
	</div>

	<div class="row" id="lessorId" style="display:none">
		<?php echo $form->labelEx($model,'lessor_business_id'); ?>
		<?php echo $form->textField($model,'lessor_business_id'); ?>
		<?php echo $form->error($model,'lessor_business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_area'); ?>
		<?php echo $form->textField($model,'business_area'); ?>
		<?php echo $form->error($model,'business_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_count'); ?>
		<?php echo $form->textField($model,'employee_count'); ?>
		<?php echo $form->error($model,'employee_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sss_ref'); ?>
		<?php echo $form->textField($model,'sss_ref'); ?>
		<?php echo $form->error($model,'sss_ref'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'fsic_ref'); ?>
		<?php echo $form->textField($model,'fsic_ref'); ?>
		<?php echo $form->error($model,'fsic_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_barcode'); ?>
		<?php echo $form->textField($model,'application_barcode'); ?>
		<?php echo $form->error($model,'application_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'barangay_barcode'); ?>
		<?php echo $form->textField($model,'barangay_barcode'); ?>
		<?php echo $form->error($model,'barangay_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zoning_barcode'); ?>
		<?php echo $form->textField($model,'zoning_barcode'); ?>
		<?php echo $form->error($model,'zoning_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sanitary_barcode'); ?>
		<?php echo $form->textField($model,'sanitary_barcode'); ?>
		<?php echo $form->error($model,'sanitary_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'occupancy_barcode'); ?>
		<?php echo $form->textField($model,'occupancy_barcode'); ?>
		<?php echo $form->error($model,'occupancy_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'others_one_barcode'); ?>
		<?php echo $form->textField($model,'others_one_barcode'); ?>
		<?php echo $form->error($model,'others_one_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'others_two_barcode'); ?>
		<?php echo $form->textField($model,'others_two_barcode'); ?>
		<?php echo $form->error($model,'others_two_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'others_three_barcode'); ?>
		<?php echo $form->textField($model,'others_three_barcode'); ?>
		<?php echo $form->error($model,'others_three_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'others_four_barcode'); ?>
		<?php echo $form->textField($model,'others_four_barcode'); ?>
		<?php echo $form->error($model,'others_four_barcode'); ?>
	</div>


</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
