<?php
/* @var $this DocumentController */
/* @var $model Document */


$this->breadcrumbs=array(
	'Businesses'=>array('business/admin'),
	$model->busAcctHolder->business->name => array('business/view','id'=>$model->busAcctHolder->business_id),
	'Documents' => array('document/index', 'id'=>$model->account_holder_id),
	"Update Documents' Statuses",
);


?>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>
