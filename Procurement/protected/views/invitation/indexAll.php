<?php
/* @var $this InvitationController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Invitations',
);

if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Invitation', 'url'=>array('search')),
		array('label'=>'View Invitations by Classification', 'url'=>array('index')),
		
	));
	}
/*if (Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin'))
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
*/	    
?>

<h1>All Invitations</h1>

<div class="viewAll" style="height:20px;padding:0px;border:none">
	<div class="width30" style="background-color:#dddddd;height:20px;text-align:center;font-weight:bold">
	Title
	</div>
	<div class="width30" style="background-color:#eeeeee;height:20px;text-align:center;font-weight:bold">
	Category
	</div>
	<div class="width40" style="background-color:#dddddd;height:20px;text-align:center;font-weight:bold">
	Description
	</div>
</div>

<?php

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view3',
	'enablePagination'=>true,
	'summaryText'=>'',
	'htmlOptions'=>array(
	),
	'pager'=>array('class'=>'CLinkPager','pageSize'=>15,'maxButtonCount'=>20),
));


?>
