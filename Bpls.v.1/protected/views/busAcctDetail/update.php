<?php
/* @var $this BusAcctDetailController */
/* @var $model BusAcctDetail */

$this->breadcrumbs=array(
		'Businesses'=>array('busAcctHolder/admin'),
		$busModel->name => array('business/view', 'id'=>$model->busAcctHolder->business_id),
		$model->sys_entry_date." - Assessment"  => array('busAcctDetail/view', 'id'=>$model->account_detail_id),
		'Update Assessment',
	);

?>

<h3 style="text-align:center"><b>Update <?php echo $model->sys_entry_date." - Assessment"; ?></b></h3>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
