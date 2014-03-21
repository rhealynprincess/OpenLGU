<?php
/* @var $this InvitationController */
/* @var $model Invitation */


$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	substr(Invitation::model()->findByPk($model->invitation_id)->title,0,15).'...' => array('invitation/view','invitation_id'=>$model->invitation_id) ,
	'submit LOI'
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

<h1>Submit Letter of Intent</h1>

<?php echo $this->renderPartial('_formLOI',array('model'=>$model,'error'=>$error)); ?>