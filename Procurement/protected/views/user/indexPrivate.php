<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Private Users',
);

if (Yii::app()->user->checkAccess('bacSec'))
	{
	$this->menu=array(
		//array('label'=>'Create User', 'url'=>array('site/createAccountOption')),
		//array('label'=>'Manage User', 'url'=>array('admin')),
		//array('label'=>'View Government Users', 'url'=>array('indexGov','show'=>'active')),
		array('label'=>'Search Users', 'url'=>array('search')),
	);
	}
else if (Yii::app()->user->checkAccess('bacUser'))
	{
	$this->menu=array(
	);
	}
else if (Yii::app()->user->checkAccess('admin'))
	{
	$this->menu=array(
	);
	}
else if (Yii::app()->user->checkAccess('govUser'))
	{
	$this->menu=array(
	);
	}
else if (Yii::app()->user->checkAccess('privateUser'))
	{
	$this->menu=array(
	);
	}	
else if (Yii::app()->user->checkAccess('authenticated'))
	{
	$this->menu=array(
	);
	}
else
	{
	$this->menu=array(
		array('label'=>'Create User', 'url'=>array('site/createAccountOption')),
	);
	}
	    
?>


<h1>Private Users</h1>


<?php 
if(isset($show)){
	if($show=='active'){
		echo 'Active ';
		echo "<span class='buttonLink'>".CHtml::link(CHtml::encode('Inactive '), array('indexPrivate','show'=>'inactive'))."</span>";	
	}

	
	if($show=='inactive'){
		echo "<span class='buttonLink'>".CHtml::link(CHtml::encode('Active '), array('indexPrivate','show'=>'active'))."</span>";
		
		echo 'Inactive ';
	}
}


if(isset($dataProvider)){
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	));
}
 ?>
