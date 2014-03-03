<?php
/* @var $this BusAcctHolderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'My Businesses' => array('business/index', 'id'=>$model->user->user_id),
	$model->name => array('business/view', 'id'=>$model->business_id),
	'Previous Records',
);


?>

<h3 style="text-align:center"><b>Previous Records</b></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
