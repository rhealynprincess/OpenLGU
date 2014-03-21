<?php
/* @var $this IssuanceController */
/* @var $model Issuance */

$this->breadcrumbs=array(
	'Issuances'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Issuance', 'url'=>array('index')),
	array('label'=>'Create Issuance', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#issuance-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Issuances</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'issuance-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'issuance_id',
		'approval_id',
		'business_reg_num',
		'full_business_name',
		'or_reference',
		'or_reference_date',
		/*
		'released_to',
		'scheduled_release_date',
		'actual_release_date',
		'issuance_barcode_ref',
		'issued_by_name',
		'issued_by_id',
		'sys_entry_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
