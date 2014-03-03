<?php
/* @var $this PaymentDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Payment Details',
);

$this->menu=array(
	array('label'=>'Create PaymentDetail', 'url'=>array('create')),
	array('label'=>'Manage PaymentDetail', 'url'=>array('admin')),
);
?>

<h1>Payment Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
