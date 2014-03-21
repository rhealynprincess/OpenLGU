<?php
/* @var $this BusAcctDetailController */
/* @var $model BusAcctDetail */


if(Yii::app()->user->role == 'ADMIN')
{
		$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business_id),
		$model->sys_entry_date.' - Assessment',
	);


	$this->menu=array(
		array('label'=>'Update Assessment', 'url'=>array('update', 'id'=>$model->account_detail_id)),
	);
} elseif(Yii::app()->user->role == 'ASSESSOR')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business_id),
		$model->sys_entry_date.' - Assessment',
	);

	
	$this->menu=array(
		array('label'=>'Update Assessment', 'url'=>array('update', 'id'=>$model->account_detail_id)),
		
	);
	
} elseif(Yii::app()->user->role == 'TREASURY')
{
	$this->breadcrumbs=array(
		'Accounts'=>array('paymentHolder/admin'),
		$busModel->name=>array('payMode/index', 'id'=>$busModel->business_id),
		$model->sys_entry_date.' - Assessment',
	);
} elseif(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Businesses'=>array('business/index', 'id'=>$acctHolder->user_id),
		$acctHolder->business->name=>array('business/view', 'id'=>$acctHolder->business->business_id),
		$model->sys_entry_date.' - Assessment',
	);
}
?>
<br/>
<h3 style="text-align:center"><b>Overall Assessment</b></h3>
<div class="view">
	
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'pay_mode',
			'capital_amount',
			'grand_total',
		),
	)); ?>
</div>

<br/><br/>

	<?php
	$this->widget('zii.widgets.jui.CJuiAccordion',array(
    'panels'=>array(
        'Assessment Breakdown'=>$this->renderPartial('_partial',array('model'=>$model),true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
        'collapsible'=>true,
        'active'=>false,

    ),
));
	
	?>
	

	
	
	



