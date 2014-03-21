<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

if (Yii::app()->user->checkAccess('admin'))
	{
	$this->menu=array(
		//array('label'=>'Create User', 'url'=>array('site/createAccountOption')),
		//array('label'=>'Manage User', 'url'=>array('admin')),
		array('label'=>'View Government Users', 'url'=>array('indexGov','show'=>'active')),
		//array('label'=>'View Bidders', 'url'=>array('indexPrivate','show'=>'active')),
		array('label'=>'Search Users', 'url'=>array('search')),
		//array('label'=>'Approve User', 'url'=>array('')),

	);
	}
else if (Yii::app()->user->checkAccess('bacUser'))
	{
	$this->menu=array(
	);
	}
else if (Yii::app()->user->checkAccess('bacSec')||Yii::app()->user->checkAccess('bacChair')||Yii::app()->user->checkAccess('LCE'))
	{
	$this->menu=array(
		//array('label'=>'Create User', 'url'=>array('site/createAccountOption')),
		//array('label'=>'Manage User', 'url'=>array('admin')),
		//array('label'=>'View Government Users', 'url'=>array('indexGov','show'=>'active')),
		array('label'=>'View Bidders', 'url'=>array('indexPrivate','show'=>'active')),
		array('label'=>'Search Users', 'url'=>array('search')),
		//array('label'=>'Approve User', 'url'=>array('')),

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


<h1>Users</h1>


<?php 
if(Yii::app()->user->checkAccess('bacSec') || Yii::app()->user->checkAccess('bacChair') || Yii::app()->user->checkAccess('LCE')){

		/*if(isset($dataProvider)){
			echo '<b>Admin</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
			));
		} 
		if(isset($dataProvider2)){
			echo '<b>Government Users</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider2,
				'itemView'=>'_view',
			));
		} */
		if(isset($dataProvider3)){
			echo '<b>Bidders</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider3,
				'itemView'=>'_view',
			));
		}
		if(isset($dataProvider4)){
			echo '<b>Pending Users</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider4,
				'itemView'=>'_view',
			));
		}
}
 else if(Yii::app()->user->checkAccess('bacUser')){

		/*if(isset($dataProvider)){
			echo '<b>Admin</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
			));
		} 
		if(isset($dataProvider2)){
			echo '<b>Government Users</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider2,
				'itemView'=>'_view',
			));
		} */
		if(isset($dataProvider3)){
			echo '<b>Bidders</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider3,
				'itemView'=>'_view',
			));
		}
		/*if(isset($dataProvider4)){
			echo '<b>Pending Users</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider4,
				'itemView'=>'_view',
			));
		}*/
}
 else if(Yii::app()->user->checkAccess('admin')){

		if(isset($dataProvider)){
			echo '<b>Admin</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
			));
		} 
		if(isset($dataProvider2)){
			echo '<b>Government Users</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider2,
				'itemView'=>'_view',
			));
		} 
		/*if(isset($dataProvider3)){
			echo '<b>Bidders</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider3,
				'itemView'=>'_view',
			));
		}
		*/
		if(isset($dataProvider5)){
			echo '<b>Pending Users</b>';
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider5,
				'itemView'=>'_view',
			));
		}
		
}
?>
