<?php
/* @var $this BusinessController */
/* @var $model Business */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trade_name'); ?>
		<?php echo $form->textField($model,'trade_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'president_name'); ?>
		<?php echo $form->textField($model,'president_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'org_type'); ?>
		<?php echo $form->textField($model,'org_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ein'); ?>
		<?php echo $form->textField($model,'ein'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tin'); ?>
		<?php echo $form->textField($model,'tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lob_code'); ?>
		<?php echo $form->textField($model,'lob_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lob_desc'); ?>
		<?php echo $form->textField($model,'lob_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capital_amount'); ?>
		<?php echo $form->textField($model,'capital_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel_num'); ?>
		<?php echo $form->textField($model,'tel_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website_url'); ?>
		<?php echo $form->textField($model,'website_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bldg_num'); ?>
		<?php echo $form->textField($model,'bldg_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bldg_name'); ?>
		<?php echo $form->textField($model,'bldg_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_num'); ?>
		<?php echo $form->textField($model,'unit_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdivision'); ?>
		<?php echo $form->textField($model,'subdivision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'barangay'); ?>
		<?php echo $form->textField($model,'barangay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'property_index_num'); ?>
		<?php echo $form->textField($model,'property_index_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_lessor'); ?>
		<?php echo $form->textField($model,'has_lessor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lessor_business_id'); ?>
		<?php echo $form->textField($model,'lessor_business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_area'); ?>
		<?php echo $form->textField($model,'business_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_count'); ?>
		<?php echo $form->textField($model,'employee_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sss_ref'); ?>
		<?php echo $form->textField($model,'sss_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sec_ref'); ?>
		<?php echo $form->textField($model,'sec_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dti_ref'); ?>
		<?php echo $form->textField($model,'dti_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cda_ref'); ?>
		<?php echo $form->textField($model,'cda_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fsic_ref'); ?>
		<?php echo $form->textField($model,'fsic_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_barcode'); ?>
		<?php echo $form->textField($model,'application_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'barangay_barcode'); ?>
		<?php echo $form->textField($model,'barangay_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zoning_barcode'); ?>
		<?php echo $form->textField($model,'zoning_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sanitary_barcode'); ?>
		<?php echo $form->textField($model,'sanitary_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'occupancy_barcode'); ?>
		<?php echo $form->textField($model,'occupancy_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'others_one_barcode'); ?>
		<?php echo $form->textField($model,'others_one_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'others_two_barcode'); ?>
		<?php echo $form->textField($model,'others_two_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'others_three_barcode'); ?>
		<?php echo $form->textField($model,'others_three_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'others_four_barcode'); ?>
		<?php echo $form->textField($model,'others_four_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tax_payment_type'); ?>
		<?php echo $form->textField($model,'tax_payment_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sys_entry_date'); ?>
		<?php echo $form->textField($model,'sys_entry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_address'); ?>
		<?php echo $form->textField($model,'full_address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->