<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();
/*if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}
*/
?>

<?php
/* @var $this ProjectProgramController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Project and Programs',
);

//public $layout='//layouts/column2';

/*$this->menu=array(
	array('label'=>'Create ProjectProgram', 'url'=>array('create')),
	array('label'=>'Manage ProjectProgram', 'url'=>array('admin')),
);*/

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

<h1>Project and Programs</h1>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>



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
		/*array(
		'name'=>'project_program_no',
		'header'=> Yii::t('app', 'Project/Program No')),*/
		array(
		'class'=>'CLinkColumn',
		'labelExpression'=>'$data->project_program_title',		
		'urlExpression'=>'Yii::app()->createUrl("projectProgram/view",array("id"=>$data->project_program_no))',
		'header'=> Yii::t('app', 'Project/Program Title')),
		array (
			'name'=>'cost',
			//'value'=>'Yii::app()->format->formatNumber($data->cost, 2)',
			'value'=>function($data) {
				return number_format($data->cost, 2);
			}
		),
		'location',
		//'source_of_fund',
		/*array(
            'name' => 'date_started',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'date_started', 
                'name'=>'date_started',
								'language'=>'',
								'i18nScriptFile' => 'jquery.ui.datepicker.js',
                'htmlOptions' => array(
                    'size' => '10',
                ),
                'defaultOptions' => array( 
                    'dateFormat' => 'yy-mm-dd',
                  
                )
            ), 
            true),
        ),
*/
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
		/*
		array(
			'class'=>'CButtonColumn',
		),*/
	),
));  ?>
