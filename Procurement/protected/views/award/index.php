<?php
/* @var $this InvitationController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Awards',
);
	
if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Awards', 'url'=>array('search')),
		array('label'=>'View All Awards', 'url'=>array('indexAll')),
	));
	}
if (Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(	));
	}
/*	  
if (Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Manage Awards', 'url'=>array('admin')),
	));
	}
*/	
?>

<h1>Awards</h1>
<?php

$opt =  new OptionRecord;
//$categories = $opt->getBusinessCategories();
$criteria= new CDbCriteria();
$criteria->select='category';
$criteria->condition="status='awarded'";
$criteria->distinct=true;
$criteria->order='category';
$categories=array();
$result= Invitation::model()->findAll($criteria);
foreach($result as $row){
	$categories[]=$row['category'];
}

//$arr = new CArrayDataProvider($categories);
$arr = new CArrayDataProvider($categories,array(
	'keyField'=>0, //php 5.3 compatibility to 5.4
));

$arr->pagination->pageSize=20;

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$arr,
	'itemView'=>'_viewCat',
	'enablePagination'=>true,
	'summaryText'=>'',
	'pager'=>array('class'=>'CLinkPager','pageSize'=>15,'maxButtonCount'=>20),
));

?>
