<?php
/* @var $this BusinessController */
/* @var $model Business */


	$this->breadcrumbs=array(
		'Businesses',
	);

//ADMIN
if(Yii::app()->user->role == 'ADMIN')
{
	$this->menu=array(
		array('label'=>'Create Business', 'url'=>array('create')),
	);
}


//ADVANCED SEARCH FUNCTION
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#business-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Businesses</h1>

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

<?php if(Yii::app()->user->role == 'ADMIN'){ ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'trade_name',
		'org_type',
		'status',
		'sys_entry_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>

<?php } else if(Yii::app()->user->role == 'BPLO'){ ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'trade_name',
		'org_type',
		'status',
		'sys_entry_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
<?php } else if(Yii::app()->user->role == 'ASSESSOR'){ ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'trade_name',
		'org_type',
		'status',
		'sys_entry_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
<?php } else if(Yii::app()->user->role == 'TREASURY'){ ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'trade_name',
		'org_type',
		'status',
		'sys_entry_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
<?php } else if(Yii::app()->user->role == 'LCE'){ ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'trade_name',
		'org_type',
		'status',
		'sys_entry_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
<?php } ?>
