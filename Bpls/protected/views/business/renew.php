<?php
/* @var $this BusinessController */
/* @var $model Business */

$this->breadcrumbs=array(
	'Businesses'=>array('index'),
	$model->name=>array('view','id'=>$model->business_id),
	'Renew',
);

?>


<?php if($newDate > $today){ ?>
	<h2 style="text-align:center"><?php echo Yii::app()->user->getFlash('renewal'); ?></h2>
<?php } else{ ?>
<h3 style="text-align:center"><b><?php echo $model->name.' - Renew'; ?></b></h3>

<?php echo $this->renderPartial('_renewForm', array('model'=>$model)); ?>

<?php } ?>
