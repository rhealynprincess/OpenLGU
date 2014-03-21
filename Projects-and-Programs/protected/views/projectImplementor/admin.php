<?php
/* @var $this ProjectImplementorController */
/* @var $model ProjectImplementor */

/*$this->breadcrumbs=array(
	'Project Implementors'=>array('index'),
	'Manage',
);*/

if(Yii::app()->user->getState("user_role")=='admin'){
	$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('Admin/index')),
'links' => array(
			"Manage",
		),
));
}

$this->menu=array(
	array('label'=>'List Projects and Programs', 'url'=>array('index')),
	array('label'=>'Create Project/Program', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#project-implementor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects and Programs</h1>

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
	'id'=>'project-implementor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//array(
		//'name'=>'project_program_no',
		//'header'=> Yii::t('app', 'Project/Program No')),
		array(
		'name'=>'project_program_title',
		'header'=> Yii::t('app', 'Project/Program Title')),
		'cost',
		'location',
		//'source_of_fund',
		array(
				'name'=>'date_started',
				'filter'=>CHtml::activeDateField(ProjectProgram::model(),'date_started', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'date_completed',
				'filter'=>CHtml::activeDateField(ProjectProgram::model(),'date_completed', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'due_date',
				'filter'=>CHtml::activeDateField(ProjectProgram::model(),'due_date', array('placeholder'=>'yyyy-mm-dd')),
		),
		'status',
		'contractor',
		'sector',
		'remarks',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
