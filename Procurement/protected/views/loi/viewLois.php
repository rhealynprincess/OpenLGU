<?php
/* @var $this BidController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bids',
);

$this->menu=array(
);
?>

<h1>Bids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$bids,
	'itemView'=>'_viewLoi',
)); ?>
