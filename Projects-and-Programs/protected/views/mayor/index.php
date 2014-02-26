<?php
/* @var $this MayorController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Mayors',
);*/

$this->menu=array(
	array('label'=>'View Reports', 'url'=>array('report/index')),
	//array('label'=>'Manage Mayor', 'url'=>array('admin')),
);
?>

<h1>Projects and Programs</h1>

<!--<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>-->
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
		'urlExpression'=>'Yii::app()->createUrl("mayor/view",array("id"=>$data->project_program_no))',
		'header'=> Yii::t('app', 'Project/Program Title')),
		'cost',
		'location',
		//'source_of_fund',
			array(
				'name'=>'date_started',
				'filter'=>CHtml::activeDateField(Mayor::model(),'date_started', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'date_completed',
				'filter'=>CHtml::activeDateField(Mayor::model(),'date_completed', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'due_date',
				'filter'=>CHtml::activeDateField(Mayor::model(),'due_date', array('placeholder'=>'yyyy-mm-dd')),
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
