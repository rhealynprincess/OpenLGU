<?php
/* @var $this MayorController */
/* @var $model Mayor */

$this->breadcrumbs=array(
	'Mayors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Mayor', 'url'=>array('index')),
	array('label'=>'Create Mayor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mayor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Mayors</h1>

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
	'id'=>'mayor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'project_program_title',
		'cost',
		'location',
		'source_of_fund',
		'date_started',
		'date_completed',
		/*
		'contractor',
		'sector',
		'project_program_no',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
