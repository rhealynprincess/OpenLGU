<?php
/* @var $this SiteController 
 * @var $model Organization
 * */

$this->pageTitle=Yii::app()->name. ' - LGU';

$this->breadcrumbs=array(
	'LGU',
);

if(Yii::app()->user->checkAccess('admin')){
	echo CHtml::link(CHtml::encode('Update'),array('updateLguProfile')); 
}
//<span style="margin-left: 13%;"><b>Amount: </b></span>

if(!isset($model)){
	echo 'LGU profile not found';
}
else{
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'name',
			'acronym',
			'tax_id_number',
			'website',
			'description',
		),
	)); 
	
}

if(!isset($model2)){
	echo 'LGU2 profile not found';
}
else{
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model2,
		'attributes'=>array(
			'government_branch',
			'type',
			'sector',
		),
	)); 
	
}

if(!isset($model3)){
	echo 'LGU3 profile not found';
}
else{
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model3,
		'attributes'=>array(
			array(
				'name'=>'land_area',
				'value'=>Yii::app()->format->formatNumber($model3->land_area)."  (SqKm)",
			),
			array(
				'name'=>'population',
				'value'=>Yii::app()->format->formatNumber($model3->population),
			),
		),
	)); 
	
}





?>


