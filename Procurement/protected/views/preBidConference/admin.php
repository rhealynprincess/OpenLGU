<?php
/* @var $this PreBidConferenceController */
/* @var $model PreBidConference */

$this->breadcrumbs=array(
	'Pre Bid Conferences'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PreBidConference', 'url'=>array('index')),
	array('label'=>'Create PreBidConference', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pre-bid-conference-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pre Bid Conferences</h1>

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
	'id'=>'pre-bid-conference-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'date_start',
		'date_end',
		'time_start',
		'time_end',
		'details',
		/*
		'participants',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
