<?php
/* @var $this PreBidConferenceController */
/* @var $model PreBidConference */

$this->breadcrumbs=array(
	'Pre Bid Conferences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PreBidConference', 'url'=>array('index')),
	array('label'=>'Manage PreBidConference', 'url'=>array('admin')),
);
?>

<h1>Create PreBidConference</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>