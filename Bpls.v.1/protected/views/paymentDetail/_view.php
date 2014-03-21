<?php
/* @var $this PaymentDetailController */
/* @var $data PaymentDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_detail_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->payment_detail_id), array('view', 'id'=>$data->payment_detail_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_mode')); ?>:</b>
	<?php echo CHtml::encode($data->pay_mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capital_amount')); ?>:</b>
	<?php echo CHtml::encode($data->capital_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gross_sales_tax')); ?>:</b>
	<?php echo CHtml::encode($data->gross_sales_tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gross_sales_tax_amt')); ?>:</b>
	<?php echo CHtml::encode($data->gross_sales_tax_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gross_sales_tax_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->gross_sales_tax_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transport_truck_tax')); ?>:</b>
	<?php echo CHtml::encode($data->transport_truck_tax); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('transport_truck_tax_amt')); ?>:</b>
	<?php echo CHtml::encode($data->transport_truck_tax_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transport_truck_tax_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->transport_truck_tax_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hazard_storage_tax')); ?>:</b>
	<?php echo CHtml::encode($data->hazard_storage_tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hazard_storage_tax_amt')); ?>:</b>
	<?php echo CHtml::encode($data->hazard_storage_tax_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hazard_storage_tax_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->hazard_storage_tax_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_tax')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_tax_amt')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_tax_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_tax_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_tax_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mayors_permit_fee')); ?>:</b>
	<?php echo CHtml::encode($data->mayors_permit_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mayors_permit_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->mayors_permit_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mayors_permit_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->mayors_permit_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garbage_fee')); ?>:</b>
	<?php echo CHtml::encode($data->garbage_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garbage_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->garbage_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garbage_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->garbage_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('truck_van_permit_fee')); ?>:</b>
	<?php echo CHtml::encode($data->truck_van_permit_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('truck_van_permit_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->truck_van_permit_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('truck_van_permit_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->truck_van_permit_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sanitary_permit_fee')); ?>:</b>
	<?php echo CHtml::encode($data->sanitary_permit_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sanitary_permit_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->sanitary_permit_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sanitary_permit_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->sanitary_permit_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bldg_insp_fee')); ?>:</b>
	<?php echo CHtml::encode($data->bldg_insp_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bldg_insp_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->bldg_insp_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bldg_insp_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->bldg_insp_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elec_insp_fee')); ?>:</b>
	<?php echo CHtml::encode($data->elec_insp_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elec_insp_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->elec_insp_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elec_insp_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->elec_insp_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mech_insp_fee')); ?>:</b>
	<?php echo CHtml::encode($data->mech_insp_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mech_insp_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->mech_insp_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mech_insp_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->mech_insp_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plumb_insp_fee')); ?>:</b>
	<?php echo CHtml::encode($data->plumb_insp_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plumb_insp_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->plumb_insp_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plumb_insp_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->plumb_insp_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_fee')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_renew_fee')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_renew_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_renew_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_renew_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_billboard_renew_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->sign_billboard_renew_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hazard_storage_fee')); ?>:</b>
	<?php echo CHtml::encode($data->hazard_storage_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hazard_storage_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->hazard_storage_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hazard_storage_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->hazard_storage_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bfp_fee')); ?>:</b>
	<?php echo CHtml::encode($data->bfp_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bfp_fee_amt')); ?>:</b>
	<?php echo CHtml::encode($data->bfp_fee_amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bfp_fee_pnl')); ?>:</b>
	<?php echo CHtml::encode($data->bfp_fee_pnl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('or_num')); ?>:</b>
	<?php echo CHtml::encode($data->or_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sys_entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->sys_entry_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_mode_id')); ?>:</b>
	<?php echo CHtml::encode($data->pay_mode_id); ?>
	<br />

	*/ ?>

</div>