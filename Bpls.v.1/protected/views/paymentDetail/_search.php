<?php
/* @var $this PaymentDetailController */
/* @var $model PaymentDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'payment_detail_id'); ?>
		<?php echo $form->textField($model,'payment_detail_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_mode'); ?>
		<?php echo $form->textField($model,'pay_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capital_amount'); ?>
		<?php echo $form->textField($model,'capital_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gross_sales_tax'); ?>
		<?php echo $form->textField($model,'gross_sales_tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gross_sales_tax_amt'); ?>
		<?php echo $form->textField($model,'gross_sales_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gross_sales_tax_pnl'); ?>
		<?php echo $form->textField($model,'gross_sales_tax_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transport_truck_tax'); ?>
		<?php echo $form->textField($model,'transport_truck_tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transport_truck_tax_amt'); ?>
		<?php echo $form->textField($model,'transport_truck_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transport_truck_tax_pnl'); ?>
		<?php echo $form->textField($model,'transport_truck_tax_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hazard_storage_tax'); ?>
		<?php echo $form->textField($model,'hazard_storage_tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hazard_storage_tax_amt'); ?>
		<?php echo $form->textField($model,'hazard_storage_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hazard_storage_tax_pnl'); ?>
		<?php echo $form->textField($model,'hazard_storage_tax_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_tax'); ?>
		<?php echo $form->textField($model,'sign_billboard_tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_tax_amt'); ?>
		<?php echo $form->textField($model,'sign_billboard_tax_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_tax_pnl'); ?>
		<?php echo $form->textField($model,'sign_billboard_tax_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mayors_permit_fee'); ?>
		<?php echo $form->textField($model,'mayors_permit_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mayors_permit_fee_amt'); ?>
		<?php echo $form->textField($model,'mayors_permit_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mayors_permit_fee_pnl'); ?>
		<?php echo $form->textField($model,'mayors_permit_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'garbage_fee'); ?>
		<?php echo $form->textField($model,'garbage_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'garbage_fee_amt'); ?>
		<?php echo $form->textField($model,'garbage_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'garbage_fee_pnl'); ?>
		<?php echo $form->textField($model,'garbage_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'truck_van_permit_fee'); ?>
		<?php echo $form->textField($model,'truck_van_permit_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'truck_van_permit_fee_amt'); ?>
		<?php echo $form->textField($model,'truck_van_permit_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'truck_van_permit_fee_pnl'); ?>
		<?php echo $form->textField($model,'truck_van_permit_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sanitary_permit_fee'); ?>
		<?php echo $form->textField($model,'sanitary_permit_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sanitary_permit_fee_amt'); ?>
		<?php echo $form->textField($model,'sanitary_permit_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sanitary_permit_fee_pnl'); ?>
		<?php echo $form->textField($model,'sanitary_permit_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bldg_insp_fee'); ?>
		<?php echo $form->textField($model,'bldg_insp_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bldg_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'bldg_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bldg_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'bldg_insp_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'elec_insp_fee'); ?>
		<?php echo $form->textField($model,'elec_insp_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'elec_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'elec_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'elec_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'elec_insp_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mech_insp_fee'); ?>
		<?php echo $form->textField($model,'mech_insp_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mech_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'mech_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mech_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'mech_insp_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plumb_insp_fee'); ?>
		<?php echo $form->textField($model,'plumb_insp_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plumb_insp_fee_amt'); ?>
		<?php echo $form->textField($model,'plumb_insp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plumb_insp_fee_pnl'); ?>
		<?php echo $form->textField($model,'plumb_insp_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_fee'); ?>
		<?php echo $form->textField($model,'sign_billboard_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_fee_amt'); ?>
		<?php echo $form->textField($model,'sign_billboard_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_fee_pnl'); ?>
		<?php echo $form->textField($model,'sign_billboard_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_renew_fee'); ?>
		<?php echo $form->textField($model,'sign_billboard_renew_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_renew_fee_amt'); ?>
		<?php echo $form->textField($model,'sign_billboard_renew_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_billboard_renew_fee_pnl'); ?>
		<?php echo $form->textField($model,'sign_billboard_renew_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hazard_storage_fee'); ?>
		<?php echo $form->textField($model,'hazard_storage_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hazard_storage_fee_amt'); ?>
		<?php echo $form->textField($model,'hazard_storage_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hazard_storage_fee_pnl'); ?>
		<?php echo $form->textField($model,'hazard_storage_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bfp_fee'); ?>
		<?php echo $form->textField($model,'bfp_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bfp_fee_amt'); ?>
		<?php echo $form->textField($model,'bfp_fee_amt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bfp_fee_pnl'); ?>
		<?php echo $form->textField($model,'bfp_fee_pnl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'or_num'); ?>
		<?php echo $form->textField($model,'or_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sys_entry_date'); ?>
		<?php echo $form->textField($model,'sys_entry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_mode_id'); ?>
		<?php echo $form->textField($model,'pay_mode_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->