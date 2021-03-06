<?php
/* @var $this BusinessController */
/* @var $model Business */

/* ADMIN */
if(Yii::app()->user->role == 'ADMIN')
{
$this->breadcrumbs=array(
	'Businesses'=>array('admin'),
	$model->name,
);



if(empty($acctHolder->busAcctDetail))
{
		$this->menu=array(
				array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
				array('label'=>'Update Business Information', 'url'=>array('business/update', 'id'=>$acctHolder->business_id)),
				array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
				array('label'=>'Create Assessment', 'url'=>array('busAcctDetail/create', 'id'=>$acctHolder->account_holder_id)),
				array('label'=>'Delete Business', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->business_id),'confirm'=>'Are you sure you want to delete this item?')),
			);

} elseif(!empty($acctHolder->busAcctDetail))
{
	if(empty($acctHolder->approval))
	{

		$this->menu=array(
				array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
				array('label'=>'Update Business Information', 'url'=>array('business/update', 'id'=>$acctHolder->business_id)),
				array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
				array('label'=>'View Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$acctHolder->busAcctDetail->account_detail_id)),
				array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$acctHolder->paymentHolder->payment_holder_id)),
				array('label'=>'Create Approval', 'url'=>array('approval/create', 'id'=>$acctHolder->account_holder_id)),
				array('label'=>'Delete Business', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->business_id),'confirm'=>'Are you sure you want to delete this item?')),
			);
			
	} elseif(!empty($acctHolder->approval))
	{
		$this->menu=array(
				array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
				array('label'=>'Update Business Information', 'url'=>array('business/update', 'id'=>$acctHolder->business_id)),
				array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
				array('label'=>'View Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$acctHolder->busAcctDetail->account_detail_id)),
				array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$acctHolder->paymentHolder->payment_holder_id)),
				array('label'=>'View Approval', 'url'=>array('approval/view', 'id'=>$acctHolder->approval->approval_id)),
				array('label'=>'Delete Business', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->business_id),'confirm'=>'Are you sure you want to delete this item?')),
			);
	}

}



}

/* BPLO */
if(Yii::app()->user->role == 'BPLO')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('admin'),
		$model->name,
	);
	if($acctHolder->approval === null)
	{
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'Update Business Information', 'url'=>array('business/update', 'id'=>$acctHolder->business_id)),
			array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
		);
	} else
	{
	
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'Update Business Information', 'url'=>array('business/update', 'id'=>$acctHolder->business_id)),
			array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
			array('label'=>'Approval', 'url'=>array('approval/view', 'id'=>$acctHolder->approval->approval_id)),
		);
	}
}


/* ASSESSOR */
if(Yii::app()->user->role == 'ASSESSOR')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('admin'),
		$model->name,
	);
	if($acctHolder->busAcctDetail === null)
	{
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'Create Assessment', 'url'=>array('busAcctDetail/create', 'id'=>$acctHolder->account_holder_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
		);
	}else
	{
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'View Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$acctHolder->busAcctDetail->account_detail_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
		);
	}
}


/* TREASURY */
if(Yii::app()->user->role == 'TREASURY')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->name,
	);
	
	if($acctHolder->busAcctDetail !== null)
	{
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$acctHolder->paymentHolder->payment_holder_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
		);
	}
	else
	{
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
		);
	}
}


/* LCE */
if(Yii::app()->user->role == 'LCE')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$model->name,
	);
	
	if(empty($acctHolder->approval))
	{
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'Create Approval', 'url'=>array('approval/create', 'id'=>$acctHolder->account_holder_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
		);
	} else
	{
		$this->menu=array(
			array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
			array('label'=>'View Approval', 'url'=>array('approval/view', 'id'=>$acctHolder->approval->approval_id)),
			array('label'=>'Taxpayer Profile', 'url'=>array('taxpayer/view', 'id'=>$acctHolder->business->business_id)),
		);
	}

}

/* REGISTERED */
if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Businesses'=>array('index', 'id'=>$model->user_id),
		$model->name,
	);

	if($forRenew == 1)
	{
		if($acctHolder->busAcctDetail === null)
		{
			$this->menu=array(
				array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
				array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
			);
		} else
		{
			if($acctHolder->approval === null)
			{
				$this->menu=array(
					array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
					array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
					array('label'=>'Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$acctHolder->busAcctDetail->account_detail_id)),
					array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$acctHolder->paymentHolder->payment_holder_id)),
				);
			} else
			{
				$this->menu=array(
					array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
					array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
					array('label'=>'Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$acctHolder->busAcctDetail->account_detail_id)),
					array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$acctHolder->paymentHolder->payment_holder_id)),
					array('label'=>'Approval', 'url'=>array('approval/view', 'id'=>$acctHolder->approval->approval_id)),
					array('label'=>'Renew Business', 'url'=>array('business/renew', 'id'=>$acctHolder->business_id)),
				);
			}
		}
	} elseif($forRenew > 1)
	{
		if($acctHolder->busAcctDetail === null)
		{
			$this->menu=array(
				array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
				array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
				array('label'=>'Previous Records', 'url'=>array('busAcctHolder/index', 'id'=>$acctHolder->business_id)),
			);
		} else
		{
			if($acctHolder->approval === null)
			{
				$this->menu=array(
					array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
					array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
					array('label'=>'Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$acctHolder->busAcctDetail->account_detail_id)),
					array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$acctHolder->paymentHolder->payment_holder_id)),
					array('label'=>'Previous Records', 'url'=>array('busAcctHolder/index', 'id'=>$acctHolder->business_id)),
				);
			} else
			{
				$this->menu=array(
					array('label'=>'Overall Progress', 'url'=>array('progress/view', 'id'=>$acctHolder->progress->progress_id)),
					array('label'=>'Documents', 'url'=>array('document/index', 'id'=>$acctHolder->account_holder_id)),
					array('label'=>'Assessment', 'url'=>array('busAcctDetail/view', 'id'=>$acctHolder->busAcctDetail->account_detail_id)),
					array('label'=>'Payments', 'url'=>array('payMode/index', 'id'=>$acctHolder->paymentHolder->payment_holder_id)),
					array('label'=>'Approval', 'url'=>array('approval/view', 'id'=>$acctHolder->approval->approval_id)),
					array('label'=>'Renew Business', 'url'=>array('business/renew', 'id'=>$acctHolder->business_id)),
					array('label'=>'Previous Records', 'url'=>array('busAcctHolder/index', 'id'=>$acctHolder->business_id)),
				);
			}
		}
	}

	


	
}

?>

<h3 style="text-align:center"><b><?php echo $model->name; ?></b></h3>

<div class="view">

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'name',
			'trade_name',
			'president_name',
			'org_type',
			'pay_mode',
			'property_index_num',
			'tax_payment_type',
			'ein',
			'tin',
			'lob_code',
			'lob_desc',
			'capital_amount',
			'tel_num',
			'website_url',
			'full_address',
			'business_area',
			'employee_count',
			'sss_ref',
			'sec_ref',
			'dti_ref',
			'cda_ref',
			'fsic_ref',
			'application_barcode',
			'barangay_barcode',
			'zoning_barcode',
			'sanitary_barcode',
			'occupancy_barcode',
			'others_one_barcode',
			'others_two_barcode',
			'others_three_barcode',
			'others_four_barcode',

		),
	)); ?>
</div>
