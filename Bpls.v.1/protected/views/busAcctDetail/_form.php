<?php
/* @var $this BusAcctDetailController */
/* @var $model BusAcctDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-acct-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<div class="view">
	<h4 style="text-align:center"><b>Create Assessment</b></h4>

	<div class="row">
		<?php echo $form->labelEx($model,'gross_sales_tax_amt'); ?>
		<?php echo $form->textField($model,'gross_sales_tax_amt'); ?>
		<?php echo $form->error($model,'gross_sales_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gross_sales_tax_pnl'); ?>
		<?php echo $form->textField($model,'gross_sales_tax_pnl'); ?>
		<?php echo $form->error($model,'gross_sales_tax_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport_truck_tax_amt'); ?>
		<?php echo $form->textField($model,'transport_truck_tax_amt'); ?>
		<?php echo $form->error($model,'transport_truck_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport_truck_tax_pnl'); ?>
		<?php echo $form->textField($model,'transport_truck_tax_pnl'); ?>
		<?php echo $form->error($model,'transport_truck_tax_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'hazard_storage_tax_amt'); ?>
		<?php echo $form->textField($model,'hazard_storage_tax_amt'); ?>
		<?php echo $form->error($model,'hazard_storage_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hazard_storage_tax_pnl'); ?>
		<?php echo $form->textField($model,'hazard_storage_tax_pnl'); ?>
		<?php echo $form->error($model,'hazard_storage_tax_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'sign_billboard_tax_amt'); ?>
		<?php echo $form->textField($model,'sign_billboard_tax_amt'); ?>
		<?php echo $form->error($model,'sign_billboard_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_billboard_tax_pnl'); ?>
		<?php echo $form->textField($model,'sign_billboard_tax_pnl'); ?>
		<?php echo $form->error($model,'sign_billboard_tax_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'mayors_permit_fee_amt'); ?>
		<?php echo $form->textField($model,'mayors_permit_fee_amt'); ?>
		<?php echo $form->error($model,'mayors_permit_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mayors_permit_fee_pnl'); ?>
		<?php echo $form->textField($model,'mayors_permit_fee_pnl'); ?>
		<?php echo $form->error($model,'mayors_permit_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'garbage_fee_amt'); ?>
		<?php echo $form->textField($model,'garbage_fee_amt'); ?>
		<?php echo $form->error($model,'garbage_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'garbage_fee_pnl'); ?>
		<?php echo $form->textField($model,'garbage_fee_pnl'); ?>
		<?php echo $form->error($model,'garbage_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'truck_van_permit_fee_amt'); ?>
		<?php echo $form->textField($model,'truck_van_permit_fee_amt'); ?>
		<?php echo $form->error($model,'truck_van_permit_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'truck_van_permit_fee_pnl'); ?>
		<?php echo $form->textField($model,'truck_van_permit_fee_pnl'); ?>
		<?php echo $form->error($model,'truck_van_permit_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'sanitary_permit_fee_amt'); ?>
		<?php echo $form->textField($model,'sanitary_permit_fee_amt'); ?>
		<?php echo $form->error($model,'sanitary_permit_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sanitary_permit_fee_pnl'); ?>
		<?php echo $form->textField($model,'sanitary_permit_fee_pnl'); ?>
		<?php echo $form->error($model,'sanitary_permit_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'bldg_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'bldg_insp_fee_amt'); ?>
		<?php echo $form->error($model,'bldg_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bldg_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'bldg_insp_fee_pnl'); ?>
		<?php echo $form->error($model,'bldg_insp_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'elec_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'elec_insp_fee_amt'); ?>
		<?php echo $form->error($model,'elec_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'elec_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'elec_insp_fee_pnl'); ?>
		<?php echo $form->error($model,'elec_insp_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'mech_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'mech_insp_fee_amt'); ?>
		<?php echo $form->error($model,'mech_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mech_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'mech_insp_fee_pnl'); ?>
		<?php echo $form->error($model,'mech_insp_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'plumb_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'plumb_insp_fee_amt'); ?>
		<?php echo $form->error($model,'plumb_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plumb_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'plumb_insp_fee_pnl'); ?>
		<?php echo $form->error($model,'plumb_insp_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'sign_billboard_fee_amt'); ?>
		<?php echo $form->textField($model,'sign_billboard_fee_amt'); ?>
		<?php echo $form->error($model,'sign_billboard_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_billboard_fee_pnl'); ?>
		<?php echo $form->textField($model,'sign_billboard_fee_pnl'); ?>
		<?php echo $form->error($model,'sign_billboard_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'sign_billboard_renew_fee_amt'); ?>
		<?php echo $form->textField($model,'sign_billboard_renew_fee_amt'); ?>
		<?php echo $form->error($model,'sign_billboard_renew_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_billboard_renew_fee_pnl'); ?>
		<?php echo $form->textField($model,'sign_billboard_renew_fee_pnl'); ?>
		<?php echo $form->error($model,'sign_billboard_renew_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'hazard_storage_fee_amt'); ?>
		<?php echo $form->textField($model,'hazard_storage_fee_amt'); ?>
		<?php echo $form->error($model,'hazard_storage_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hazard_storage_fee_pnl'); ?>
		<?php echo $form->textField($model,'hazard_storage_fee_pnl'); ?>
		<?php echo $form->error($model,'hazard_storage_fee_pnl'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'bfp_fee_amt'); ?>
		<?php echo $form->textField($model,'bfp_fee_amt'); ?>
		<?php echo $form->error($model,'bfp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bfp_fee_pnl'); ?>
		<?php echo $form->textField($model,'bfp_fee_pnl'); ?>
		<?php echo $form->error($model,'bfp_fee_pnl'); ?>
	</div>
	
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
