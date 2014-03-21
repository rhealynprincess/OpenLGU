<?php
/* @var $this PaymentHolderController */
/* @var $model PaymentHolder */

	$this->breadcrumbs=array(
		'Accounts',
	);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#payment-holder-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Payment Holders</h1>

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

<?php if(Yii::app()->user->role == 'TREASURY'){ ?>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'payment-holder-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'payment_holder_id',
			'account_holder_id',
			'business_id',
			array(
					'class'=>'CButtonColumn',
					'template'=>'{view}',
					'buttons'=>array(
						'view'=>array(
							'url'=>'$this->grid->controller->createUrl("business/view", array("id"=>$data->business_id))',
						),
					),
				),
		),
	)); ?>
<?php } elseif(Yii::app()->user->role == 'ADMIN'){ ?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'payment-holder-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'payment_holder_id',
			'account_holder_id',
			'business_id',
			array(
					'class'=>'CButtonColumn',
					'template'=>'{view}',
					'buttons'=>array(
						'view'=>array(
							'url'=>'$this->grid->controller->createUrl("payMode/index", array("id"=>$data->payment_holder_id))',
						),
					),
				),
		),
	)); ?>
<?php } ?>
