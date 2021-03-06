<?php
/* @var $this DocumentController */
/* @var $dataProvider CActiveDataProvider */

if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
			'My Businesses'=>array('business/index', 'id'=>$acctHolder->business->user_id),
			$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business_id),
			'Documents',
	);
	
	if(!empty($dataProvider))
	{
		$this->menu=array(
			array('label'=>'Upload Documents', 'url'=>array('document/create', 'id'=>$acctHolder->account_holder_id)),
		);
	
	}

} elseif(Yii::app()->user->role == 'BPLO')
{
	$this->breadcrumbs=array(
			'Businesses'=>array('business/admin'),
			$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business_id),
			'Documents',
	);
	
	if(!empty($dataProvider) && (!empty($acctHolder->document)))
	{
		$this->menu=array(
			array('label'=>'Update Status', 'url'=>array('document/update', 'id'=>$acctHolder->document->document_id)),
		);
	
	}

} elseif(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
			'Businesses'=>array('business/admin'),
			$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business_id),
			'Documents',
	);
	
	if(!empty($dataProvider) && (!empty($acctHolder->document)))
	{
		if(!empty($acctHolder->document))
		{
			$this->menu=array(
			array('label'=>'Update Status', 'url'=>array('document/update', 'id'=>$acctHolder->document->document_id)),
		);
		}
		else
		{
			$this->menu=array(
			array('label'=>'Upload Documents', 'url'=>array('document/create', 'id'=>$acctHolder->account_holder_id)),
			);
		}
		
	
	}
}



?>

<h3 style="text-align:center"><b>Documents</b></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
