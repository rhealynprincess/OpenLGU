<?php
/* @var $this PayModeController */
/* @var $dataProvider CActiveDataProvider */

if((Yii::app()->user->role == 'ADMIN'))
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business->business_id),
		'Payment Schedule',
	);
} elseif(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Businesses'=>array('business/index', 'id'=>$acctHolder->business->user_id),
		$acctHolder->business->name=>array('business/view', 'id'=>$acctHolder->business->business_id),
		'Payment Record',
	);

} elseif(Yii::app()->user->role == 'TREASURY')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business->business_id),
		'Payment Schedule',
	);
}




?>

<h3 style="text-align:center"><b>Business Name: <?php echo $acctHolder->business->name; ?></b></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'viewData'=>array('acctHolder'=>$acctHolder),
)); ?>
