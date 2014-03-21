<?php
/* @var $this BusAcctDetailController */
/* @var $model BusAcctDetail */

if(Yii::app()->user->role == 'ASSESSOR')
{
	$this->breadcrumbs=array(
		'Businesses'=>array('business/admin'),
		$acctHolder->business->name => array('business/view', 'id'=>$acctHolder->business_id),
		'Create Assessment',
	);

}

?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
