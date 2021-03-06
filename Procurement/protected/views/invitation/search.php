<?php
/* @var $this InvitationController */
/* @var $model Invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	'Search',
);

if(true)
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'View All Invitations', 'url'=>array('indexAll')),
		array('label'=>'View Invitations by Classification', 'url'=>array('index')),
		
	));
	}
/*
if (Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Create Invitation', 'url'=>array('create')),
	));
	}	  
if (Yii::app()->user->checkAccess('admin'))
	{
	$this->menu = array_merge($this->menu,array(
		array('label'=>'Manage Invitation', 'url'=>array('admin')),
	));
	}
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('invitation-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Search Invitations</h1>

<!-- 
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
 -->
 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invitation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
		array(
			'class'=>'CLinkColumn',
			'label'=>'view',
			'urlExpression'=>'"index.php?r=invitation/view&id=".$data->id',
		),
		'title',
		'classification',
		'category',
		'description',
		/*
		'abc',
		'contract_duration',
		'contact_details',
		'status',
		'date_published',
		'time_published',
		'time_last_modified',
		'date_last_modified',
		'date_closing',
		'time_closing',
		'total_document_request',
		'created_by',
		'area_of_delivery',
		*/
	),
)); ?>
