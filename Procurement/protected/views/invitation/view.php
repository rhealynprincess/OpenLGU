<?php
/* @var $this InvitationController */
/* @var $model Invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	substr($model->title,0,15).'...',
);

if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Search Invitation', 'url'=>array('search')),
		array('label'=>'View All Invitations', 'url'=>array('indexAll')),
		array('label'=>'View Invitations by Classification', 'url'=>array('index')),
		
	));
	}
if (Yii::app()->user->checkAccess('bacSec'))
	{
	$this->menu = array_merge($this->menu,array(
			array('label'=>'Create Invitation', 'url'=>array('create')),
			//array('label'=>'Update Invitation', 'url'=>array('update', 'id'=>$model->id)),
	));

	if($model->status=='pending'){
		$this->menu = array_merge($this->menu,array(
			array('label'=>'Approve Invitation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('approve','id'=>$model->id),'confirm'=>'Approve?')),
		));
		}
	}	  
/*if (Yii::app()->user->checkAccess('bacSec'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Delete Invitation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Invitation', 'url'=>array('admin')),
	));
	}*/

	
if($model->status=='pending'){
	echo '<div class="pend">';
	echo 'Status: PENDING';
	echo '</div>';
}
if($model->status=='awarded'){
	echo '<div class="pend">';
	echo 'Status: AWARDED';
	echo '</div>';
}
if($model->status=='failed'){
	echo '<div class="pend">';
	echo 'Status: FAILED BIDDING';
	echo '</div>';
}

?>

<?php 
if($model->classification=='Goods'){
	$myView = '_viewGoods';
}
if($model->classification=='Infrastructure'){
	$myView = '_viewInfra';
	
}
if($model->classification=='Consulting Services'){
	$myView = '_viewConsulting';
	
}
	
echo $this->renderPartial($myView,array(
			'model'=>$model,
			'bac'=>$bac,
			'preBid'=>$preBid,
			'bidEnv'=>$bidEnv,
			'bidEval'=>$bidEval,
			'postQua'=>$postQua,
			'awarding'=>$awarding,
			'ntp'=>$ntp,
			'bids'=>$bids,
			'lois'=>$lois,
			'loi'=>$loi,
			'eliCheck'=>$eliCheck,
			'shortlist'=>$shortlist,
			'nego'=>$nego,
			'sho'=>$sho,
	));
	
