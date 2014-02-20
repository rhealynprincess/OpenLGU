<?php
/* @var $this LoiController */
/* @var $model Loi */

$this->breadcrumbs=array(
	'Invitations'=>array('invitation/index'),
	substr(Invitation::model()->findByPk($inv_id)->title,0,15).'...' => array('invitation/view','id'=>$inv_id) ,
	'Letter of Intent',
);
if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Invitation', 'url'=>array('invitation/search')),
		array('label'=>'View All Invitations', 'url'=>array('invitation/indexAll')),
		array('label'=>'View Invitations by Classification', 'url'=>array('invitation/index')),
		
	));
	}
if (Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin'))
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

<h1>Letter of Intent </h1>

<?php

	echo CHtml::link(CHtml::encode('edit loi'), array('loi/submit','id'=>$model->invitation_id));
	echo '<br/>';
			
	echo 'view (<a href="files/loi/'.$model->file_location.'">'.$model->file_location.'</a>)';
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'status',
		'date_submitted',
		'time_submitted',
		'date_last_modified',
		'time_last_modified',
	),
)); ?>
