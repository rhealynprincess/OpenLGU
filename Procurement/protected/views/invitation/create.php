<?php
/* @var $this InvitationController */
/* @var $model Invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	'Create',
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

<h1>Create Invitation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>