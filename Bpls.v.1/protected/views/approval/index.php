<?php
/* @var $this ApprovalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
		'Businesses'=>array('busAcctHolder/admin'),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business->business_id),
		'Approvals',
	);

$this->menu=array(
	array('label'=>'Create Approval', 'url'=>array('create', 'id'=>$acctHolder->account_holder_id)),
);
?>

<h1>Approvals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
