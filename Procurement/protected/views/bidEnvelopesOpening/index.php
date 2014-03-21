<?php
/* @var $this BidEnvelopesOpeningController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bid Envelopes Openings',
);

$this->menu=array(
	array('label'=>'Create BidEnvelopesOpening', 'url'=>array('create')),
	array('label'=>'Manage BidEnvelopesOpening', 'url'=>array('admin')),
);
?>

<h1>Bid Envelopes Openings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
