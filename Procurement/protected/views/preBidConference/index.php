<?php
/* @var $this PreBidConferenceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pre Bid Conferences',
);

$this->menu=array(
	array('label'=>'Create PreBidConference', 'url'=>array('create')),
	array('label'=>'Manage PreBidConference', 'url'=>array('admin')),
);
?>

<h1>Pre Bid Conferences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
