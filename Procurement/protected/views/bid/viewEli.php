<?php
/* @var $this PreBidConferenceController */
/* @var $model PreBidConference */
$this->breadcrumbs=array(
	'Invitations'=>array('invitation/index'),
	substr(Invitation::model()->findByPk($model->invitation_id)->title,0,15).'...' => array('invitation/view','id'=>$model->invitation_id) ,
	'Eligibility',
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
	}?>

<h1>Eligibility Bid </h1>

<?php


	$org = Organization::model()->findByPk($model->user_id);
	if(isset($org))
	echo 'view (<a href="files/bid/'.$org->eligibility_doc_file_location.'">'.$org->eligibility_doc_file_location.'</a>)';

	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$modele,
	'attributes'=>array(
		'status',
		'date_submitted',
		'time_submitted',
		'date_evaluated',
		'time_evaluated',
		'date_last_modified',
		'time_last_modified',
	),
)); ?>