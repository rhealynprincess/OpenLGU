<?php
/* @var $this BidEvaluationController */
/* @var $model BidEvaluation */

$this->breadcrumbs=array(
	'Invitations'=>array('invitation/index'),
	substr(Invitation::model()->findByPk($model->id)->title,0,15).'...' => array('invitation/view','id'=>$model->id) ,
	'Update Bid Evaluation',
);

if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Invitation', 'url'=>array('Invitation/search')),
		array('label'=>'View All Invitations', 'url'=>array('Invitation/indexAll')),
		array('label'=>'View Invitations by Classification', 'url'=>array('Invitation/index')),
		
	));
	}
if (Yii::app()->user->checkAccess('bacSec'))
	{
	$this->menu = array_merge($this->menu,array(
			array('label'=>'Create Invitation', 'url'=>array('create')),
	));
	}	  
/*if (Yii::app()->user->checkAccess('bacSec'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Manage Invitation', 'url'=>array('admin')),
	));
	}*/
?>

<h1>Update Bid Evaluation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
