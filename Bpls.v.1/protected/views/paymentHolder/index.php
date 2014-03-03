<?php
/* @var $this PaymentHolderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Payment Holders',
);

$this->menu=array(
	array('label'=>'Create PaymentHolder', 'url'=>array('create')),
	array('label'=>'Manage PaymentHolder', 'url'=>array('admin')),
);
?>

<h1>Payment Holders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
