<?php
/* @var $this DocumentController */
/* @var $model Document */


if(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$busModel->name => array('business/view', 'id'=>$busModel->business_id),
		'Documents' => array('index', 'id'=>$busModel->business_id),
		'Upload Documents',
	);
} elseif(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Businesses'=>array('business/index', 'id'=>$acctHolder->user_id),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business_id),
		'My Documents' => array('index', 'id'=>$acctHolder->account_holder_id),
		'Upload Documents',
	);
}

?>

<h3 style="text-align:center"><b>Upload Required Documents</b></h3>
<h5>Note: We only accept PDF files</h5>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
