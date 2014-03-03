<?php
/* @var $this BusAcctHolderController */
/* @var $model BusAcctHolder */

$this->breadcrumbs=array(
	'Bus Acct Holders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusAcctHolder', 'url'=>array('index')),
	array('label'=>'Manage BusAcctHolder', 'url'=>array('admin')),
);
?>

<h1>Create BusAcctHolder</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>