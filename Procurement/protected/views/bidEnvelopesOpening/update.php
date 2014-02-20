<?php
/* @var $this BidEnvelopesOpeningController */
/* @var $model BidEnvelopesOpening */

$this->breadcrumbs=array(
	'Invitations'=>array('invitation/index'),
	substr(Invitation::model()->findByPk($model->id)->title,0,15).'...' => array('invitation/view','id'=>$model->id) ,
	'Bid Envelopes Opening Update',
);
if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Invitation', 'url'=>array('search')),
		array('label'=>'View All Invitations', 'url'=>array('indexAll')),
		array('label'=>'View Invitations by Classification', 'url'=>array('index')),
		
	));
	}
if (Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(
			array('label'=>'Create Invitation', 'url'=>array('create')),
	));
	}	  
if (Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Manage Invitation', 'url'=>array('admin')),
	));
	}

?>	

<?php 
		echo '<span class="rightLink" style="font-size:15px">';
		echo CHtml::link(CHtml::encode('cancel'), array('invitation/view','id'=>$model->id));
		echo '</span>';
	?>
<h1>Update Eligibility and Bid Envelopes Receipt and Opening</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>