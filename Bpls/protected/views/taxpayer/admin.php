<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */

$this->breadcrumbs=array(
	'Taxpayers',
);

$this->menu=array(
	//array('label'=>'List Taxpayer', 'url'=>array('index')),
	array('label'=>'Create Taxpayer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	
	
	
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#taxpayer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Taxpayers</h1>

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
	'id'=>'taxpayer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'user_id',
		'email',
		'first_name',
		'middle_name',
		'last_name',
		'tin',
		'application_date',
		/*
		'last_name',
		'suffix_name',
		'full_name',
		'dob_month',
		'dob_day',
		'dob_year',
		'dob_full',
		'civil_status',
		'gender',
		'role',
		'sys_entry_date',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
