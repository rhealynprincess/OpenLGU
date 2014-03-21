<?php
/* @var $this AwardingController */
/* @var $model Awarding */

$this->breadcrumbs=array(
	'Invitations'=>array('invitation/index'),
	substr(Invitation::model()->findByPk($model->id)->title,0,15).'...' => array('invitation/view','id'=>$model->id) ,
	'Awarding Update',
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

<h1>Update Awarding</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
