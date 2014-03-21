<?php
/* @var $this BusAcctHolderController */
/* @var $model BusAcctHolder */

$this->breadcrumbs=array(
	'Bus Acct Holders'=>array('index'),
	$model->account_holder_id=>array('view','id'=>$model->account_holder_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusAcctHolder', 'url'=>array('index')),
	array('label'=>'Create BusAcctHolder', 'url'=>array('create')),
	array('label'=>'View BusAcctHolder', 'url'=>array('view', 'id'=>$model->account_holder_id)),
	array('label'=>'Manage BusAcctHolder', 'url'=>array('admin')),
);
?>

<h1>Update BusAcctHolder <?php echo $model->account_holder_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>