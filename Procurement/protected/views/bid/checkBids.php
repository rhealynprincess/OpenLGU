<?php
/* @var $this BidController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Invitations'=>array('invitation/index'),
	substr(Invitation::model()->findByPk($inv_id)->title,0,15).'...' => array('invitation/view','id'=>$inv_id) ,
	'Evaluate Bids'
	);


if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Invitation', 'url'=>array('invitation/search')),
		array('label'=>'View All Invitations', 'url'=>array('invitation/indexAll')),
		array('label'=>'View Invitations by Classification', 'url'=>array('invitation/index')),
		));
	}
if (Yii::app()->user->checkAccess('privateUser'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Cancel Bid', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	));
	}	
if (Yii::app()->user->checkAccess('bacSec')||Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Create Invitation', 'url'=>array('invitation/create')),
	));
	}	  
if (Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Manage Invitation', 'url'=>array('invitation/admin')),
	));
	}
	?>

<h1>Bids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$bids,
	'itemView'=>'_viewBidsCheck',
)); ?>
