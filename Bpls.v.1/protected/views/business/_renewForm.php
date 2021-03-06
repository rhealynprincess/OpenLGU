<?php
/* @var $this BusinessController */
/* @var $model Business */
/* @var $form CActiveForm */
?>




<div class="form">
<div class="view">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'renew-business-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>





	<div class="row">
		<?php echo $form->labelEx($model,'president_name'); ?>
		<?php echo $form->textField($model,'president_name'); ?>
		<?php echo $form->error($model,'president_name'); ?>
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
		<?php echo $form->labelEx($model,'has_lessor'); ?>
		<?php echo $form->dropDownList($model,'has_lessor', $model::hasLessor(), array('prompt'=>'', 'id'=>'hasLessor')); ?>
		<?php echo $form->error($model,'has_lessor'); ?>
	</div>

<?php if($model->has_lessor == 'Yes'){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'lessor_business_id'); ?>
		<?php echo $form->textField($model,'lessor_business_id'); ?>
		<?php echo $form->error($model,'lessor_business_id'); ?>
	</div>
<?php } ?>

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





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
