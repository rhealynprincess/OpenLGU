<?php
/* @var $this BidController */
/* @var $model Bid */

$this->breadcrumbs=array(
	'Bids'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
);
?>

<h1>Update Bid</h1>

<?php echo $this->renderPartial('_formBidCCP', array('model'=>$model)); ?>
