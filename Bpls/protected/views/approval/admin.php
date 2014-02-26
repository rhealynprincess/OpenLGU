<?php
/* @var $this ApprovalController */
/* @var $model Approval */

$this->breadcrumbs=array(
	'Approvals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Approval', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#approval-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Approvals</h1>

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
	'id'=>'approval-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'approval_id',
		'sic_code',
		'property_index_code',
		'postal_code',
		'full_business_name',
		'remarks',
		/*
		'approval_status',
		'business_reg_num',
		'action_date',
		'approval_date',
		'issue_date',
		'next_renewal_date',
		'sys_entry_date',
		'account_holder_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
