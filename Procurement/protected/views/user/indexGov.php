<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Government Users',
);

if (Yii::app()->user->checkAccess('admin'))
	{
	$this->menu=array(
		//array('label'=>'Create User', 'url'=>array('site/createAccountOption')),
		//array('label'=>'Manage User', 'url'=>array('admin')),
		//array('label'=>'View Bidders', 'url'=>array('indexPrivate','show'=>'active')),
		array('label'=>'Search Users', 'url'=>array('search')),
	);
	}
else if (Yii::app()->user->checkAccess('bacUser'))
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


<h1>Government Users</h1>


<?php
if(isset($show)){
	if($show=='active'){
		echo 'Active ';
	//	echo CHtml::link(CHtml::encode('Pending '), array('indexGov','show'=>'pending'));
		echo CHtml::link(CHtml::encode('Inactive '), array('indexGov','show'=>'inactive'));	
	}
	/*if($show=='pending'){
		echo CHtml::link(CHtml::encode('Active '), array('indexGov','show'=>'active'));
		echo 'Pending ';
		echo CHtml::link(CHtml::encode('Inactive '), array('indexGov','show'=>'inactive'));
	}*/
	
	if($show=='inactive'){
		echo CHtml::link(CHtml::encode('Active '), array('indexGov','show'=>'active'));
		//echo CHtml::link(CHtml::encode('Pending '), array('indexGov','show'=>'pending'));
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
