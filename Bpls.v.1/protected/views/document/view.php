<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documents'=>array('index'),

);


?>

<h1>View Document #</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'document_id',
		'business_id',
		'barangay_clearance',
		'barangay_status',
		'zoning_clearance',
		'zoning_status',
		'sanitary_clearance',
		'sanitary_status',
		'occupancy_permit',
		'occupancy_status',
		'fire_safety',
		'fire_safety_status',
	),
)); ?>
