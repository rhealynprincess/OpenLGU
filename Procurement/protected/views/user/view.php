<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->first_name.' '.strtoupper(substr($model->middle_name,0,1)).'. '.$model->last_name,
);

if($model->role=='Government User')
	$updateLink = 'updateGov';
else
	$updateLink = 'updatePrivate';

//bacSec
if(Yii::app()->user->checkAccess('bacSec')) {
	if($model->account_status=='pending'){
	$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
		array('label'=>'Create User', 'url'=>array('/site/createAccountOption')),
		array('label'=>'Update User', 'url'=>array($updateLink, 'id'=>$model->id)),
		//array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//	array('label'=>'Manage User', 'url'=>array('admin')),
		array('label'=>'Search Users', 'url'=>array('search')),
		array('label'=>'Approve User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('approve','id'=>$model->id),'confirm'=>'Approve?')),
	);
	}

	else if($model->account_status=='active')
	{
	$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
		array('label'=>'Create User', 'url'=>array('/site/createAccountOption')),
		array('label'=>'Update User', 'url'=>array($updateLink, 'id'=>$model->id)),
		//array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Search Users', 'url'=>array('search')),
		array('label'=>'Deactivate User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('deactivate','id'=>$model->id),'confirm'=>'Deactivate?')),
		//array('label'=>'Manage User', 'url'=>array('admin')),
	);
	}
	
	if($model->account_status=='inactive'){
	$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
		array('label'=>'Create User', 'url'=>array('/site/createAccountOption')),
		array('label'=>'Update User', 'url'=>array($updateLink, 'id'=>$model->id)),
		//array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//	array('label'=>'Manage User', 'url'=>array('admin')),
		array('label'=>'Search Users', 'url'=>array('search')),
		array('label'=>'Activate User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('approve','id'=>$model->id),'confirm'=>'Activate?')),
	);
	}

}
//self
else if(Yii::app()->user->id==$model->id){
	$this->menu=array(
		//array('label'=>'List User', 'url'=>array('index')),
		//array('label'=>'Update User', 'url'=>array($updateLink, 'id'=>$model->id)),
	);

}
//admin
else if(Yii::app()->user->checkAccess('admin')) {
	if($model->account_status=='pending'){
	$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
		//array('label'=>'Create User', 'url'=>array('/site/createAccountOption')),
		array('label'=>'Update User', 'url'=>array($updateLink, 'id'=>$model->id)),
		//array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		//array('label'=>'Manage User', 'url'=>array('admin')),
		array('label'=>'Search Users', 'url'=>array('search')),
		array('label'=>'Approve User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('ApproveGov','id'=>$model->id),'confirm'=>'Approve?')),
	);
	}

	else if ($model->account_status=='active')
	{
	$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
		//array('label'=>'Create User', 'url'=>array('/site/createAccountOption')),
		array('label'=>'Update User', 'url'=>array($updateLink, 'id'=>$model->id)),
		//array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Search Users', 'url'=>array('search')),
		array('label'=>'Deactivate User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('DeactivateGov','id'=>$model->id),'confirm'=>'De-activate?')),
		//array('label'=>'Manage User', 'url'= 	>array('admin')),
	);
	}

	else if ($model->account_status=='inactive')
	{
	$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
		//array('label'=>'Create User', 'url'=>array('/site/createAccountOption')),
		array('label'=>'Update User', 'url'=>array($updateLink, 'id'=>$model->id)),
		//array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Search Users', 'url'=>array('search')),
		array('label'=>'Activate User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('ApproveGov','id'=>$model->id),'confirm'=>'Approve?')),
		//array('label'=>'Manage User', 'url'= 	>array('admin')),
	);
	}
}

//others
else{
	$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
	);
}
?>

<?php 
if(isset($model2)){
	if(Yii::app()->user->checkAccess('privateUser')){
		echo '<b>Eligibility Documents:&nbsp;&nbsp;</b>';
		echo '<a href="files/eli/'.$model2->eligibility_doc_file_location.'">'.$model2->eligibility_doc_file_location.'</a>';
		echo '<span class="rightLink" style="font-size:15px">';
		echo '</span>';
		echo '<br/>';
		echo CHtml::link(CHtml::encode('Update Eligibility Documents'), array('user/updateEli','id'=>$model->id));
		echo '<br /><br />';
	}
	echo '<h1>'.$model2->name.'</h1>';
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model2,
		'attributes'=>array(
			'name',
			'acronym',
			'former_name',
			'tax_id_number',
			'website',
			'description',
			'country',
			'region',
			'province',
			'city_or_municipality',
			'street_address',
			'zip_code',
		),
	)); 
}
?>

<?php 
if(isset($model3)){
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model3,
		'attributes'=>array(
			'form',
			'type',
			'business_category',
			'dti_reg_number',
			'sec_reg_number',
			'cda_reg_number',
			'incorporation_date',
			'employees_count',
			'prev_year_revenue',
		),
	)); 
}
?>

<?php 
	if(Yii::app()->user->checkAccess('admin')&&$model->account_status=='active' && $model->role=="Government User"){
		if($model->is_bac_member == 'false' && $model->is_bac_secretariat == 'false' && $model->is_bac_chairman == 'false' && $model->is_local_chief_executive == 'false'){

			echo CHtml::link(CHtml::encode('Set as BAC Member'), array('setAsBac','id'=>$model->id));
			echo "<br/>";
	
			$count=User::model()->countByAttributes(array('is_bac_secretariat'=>'true'));		
			echo CHtml::link(CHtml::encode('Set as BAC Secretariat'), array('setAsBacSec','id'=>$model->id));
			echo "<br/>";

			$count=User::model()->countByAttributes(array('is_bac_chairman'=>'true'));
			if($count==0){
			echo CHtml::link(CHtml::encode('Set as BAC Chairman'), array('setAsBacChair','id'=>$model->id));
			echo "<br/>";
			}

			$count=User::model()->countByAttributes(array('is_local_chief_executive'=>'true'));		
			if($count==0){
			echo CHtml::link(CHtml::encode('Set as LCE'), array('setAsLCE','id'=>$model->id));
			echo "<br/>";			
			}
		}	
		else{
			if($model->is_bac_member == 'true'){
			echo '<b>BAC MEMBER<br/></b>';
			echo CHtml::link(CHtml::encode('Remove as BAC Member'), array('removeAsBac','id'=>$model->id));
			}		
			
		
			else if($model->is_bac_secretariat == 'true'){
			echo '<b>BAC SECRETARIAT<br/></b>';
			echo CHtml::link(CHtml::encode('Remove as BAC Secretariat'), array('removeAsBacSec','id'=>$model->id));
			}

			else if($model->is_bac_chairman == 'true'){
			echo '<b>BAC CHAIRMAN<br/></b>';
			echo CHtml::link(CHtml::encode('Remove as BAC Chairman'), array('removeAsBacChair','id'=>$model->id));
			}

			else if($model->is_local_chief_executive == 'true'){
			echo '<b>LOCAL CHIEF EXECUTIVE<br/></b>';
			echo CHtml::link(CHtml::encode('Remove as LCE'), array('removeAsLCE','id'=>$model->id));
			}		
		}

	}
	
	echo '<h1>'.$model->first_name.' '.strtoupper(substr($model->middle_name,0,1)).'. '.$model->last_name.'</h1>';
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'username',
			'role',
			'position',
			'first_name',
			'middle_name',
			'last_name',
			'birth_date',
			'sex',
			'tel_num',
			'fax_num',
			'email_add',
			'other_contact_details',
		),
	));
?>

<br/>
<br/>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'country',
		'region',
		'province',
		'city_or_municipality',
		'street_address',
		'zip_code',
	),
)); ?>

<br/>
<br/>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'date_created',
		'time_created',
		'date_approved',
		'time_approved',
		'date_last_modified',
		'time_last_modified',
		'account_status',
	),
)); ?>

