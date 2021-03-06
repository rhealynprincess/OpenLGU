<?php
/* @var $this InvitationController */
/* @var $model Invitation */


$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	substr(Invitation::model()->findByPk($model->invitation_id)->title,0,15).'...' => array('invitation/view','id'=>$model->invitation_id) ,
	'Eligibility Bid',
);

if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Invitation', 'url'=>array('invitation/search')),
		array('label'=>'View All Invitations', 'url'=>array('invitation/indexAll')),
	));
	}
if (Yii::app()->user->checkAccess('privateUser'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Cancel Bid', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
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

<h1>Submit Bid</h1>

<?php echo $this->renderPartial('_formBidEli',array('model'=>$model,'error'=>$error)); ?>
