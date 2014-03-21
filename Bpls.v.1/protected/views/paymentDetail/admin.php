<?php
/* @var $this PaymentDetailController */
/* @var $model PaymentDetail */

$this->breadcrumbs=array(
	'Payment Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PaymentDetail', 'url'=>array('index')),
	array('label'=>'Create PaymentDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#payment-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Payment Details</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'payment_detail_id',
		'pay_mode',
		'capital_amount',
		'gross_sales_tax',
		'gross_sales_tax_amt',
		'gross_sales_tax_pnl',
		/*
		'transport_truck_tax',
		'transport_truck_tax_amt',
		'transport_truck_tax_pnl',
		'hazard_storage_tax',
		'hazard_storage_tax_amt',
		'hazard_storage_tax_pnl',
		'sign_billboard_tax',
		'sign_billboard_tax_amt',
		'sign_billboard_tax_pnl',
		'mayors_permit_fee',
		'mayors_permit_fee_amt',
		'mayors_permit_fee_pnl',
		'garbage_fee',
		'garbage_fee_amt',
		'garbage_fee_pnl',
		'truck_van_permit_fee',
		'truck_van_permit_fee_amt',
		'truck_van_permit_fee_pnl',
		'sanitary_permit_fee',
		'sanitary_permit_fee_amt',
		'sanitary_permit_fee_pnl',
		'bldg_insp_fee',
		'bldg_insp_fee_amt',
		'bldg_insp_fee_pnl',
		'elec_insp_fee',
		'elec_insp_fee_amt',
		'elec_insp_fee_pnl',
		'mech_insp_fee',
		'mech_insp_fee_amt',
		'mech_insp_fee_pnl',
		'plumb_insp_fee',
		'plumb_insp_fee_amt',
		'plumb_insp_fee_pnl',
		'sign_billboard_fee',
		'sign_billboard_fee_amt',
		'sign_billboard_fee_pnl',
		'sign_billboard_renew_fee',
		'sign_billboard_renew_fee_amt',
		'sign_billboard_renew_fee_pnl',
		'hazard_storage_fee',
		'hazard_storage_fee_amt',
		'hazard_storage_fee_pnl',
		'bfp_fee',
		'bfp_fee_amt',
		'bfp_fee_pnl',
		'or_num',
		'sys_entry_date',
		'pay_mode_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
