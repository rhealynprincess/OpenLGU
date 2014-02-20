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
		array('label'=>'View All Invitations', 'url'=>array('indexAll')),
	));
	}
if (Yii::app()->user->checkAccess('bacSec'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Create Invitation', 'url'=>array('create')),
	));
	}	  
if (Yii::app()->user->checkAccess('bacSec'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Manage Invitation', 'url'=>array('admin')),
	));
	}
	
?>

<h1>Invitations</h1>
<?php
$opt =  new OptionRecord;
//$categories = $opt->getBusinessCategories();

$criteria= new CDbCriteria();
$criteria->select='category';
$criteria->condition="status='active'";
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
