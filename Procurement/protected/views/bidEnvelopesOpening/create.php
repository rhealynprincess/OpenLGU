<?php
/* @var $this BidEnvelopesOpeningController */
/* @var $model BidEnvelopesOpening */

$this->breadcrumbs=array(
	'Bid Envelopes Openings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BidEnvelopesOpening', 'url'=>array('index')),
	array('label'=>'Manage BidEnvelopesOpening', 'url'=>array('admin')),
);
?>

<h1>Create BidEnvelopesOpening</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>