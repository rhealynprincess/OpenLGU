<?php
/* @var $this ProjectProgramController */
/* @var $model ProjectProgram */

/*$this->breadcrumbs=array(
	'Project Programs'=>array('index'),
	'Manage',
);
*/
$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('projectImplementor/index')),
'links' => array(
			"Manage Projects and Programs",
		),
));
$this->menu=array(
	array('label'=>'List ProjectProgram', 'url'=>array('index')),
	array('label'=>'Create ProjectProgram', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#project-program-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Project Programs</h1>

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
	'id'=>'project-program-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'project_program_no',
		'project_program_title',
		'cost',
		'location',
		'source_of_fund',
		'date_started',
		/*
		'date_completed',
		'contractor',
		'sector',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
