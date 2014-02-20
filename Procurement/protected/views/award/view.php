<?php
/* @var $this AwardController */
/* @var $model Award */

$this->breadcrumbs=array(
	'Awards'=>array('index'),
	substr($model->title,0,15).'...',
);

$this->menu=array(
	array('label'=>'List Award', 'url'=>array('index')),
);
	echo '<span class="rightLink">';
	echo CHtml::link(CHtml::encode('View Invitation'), array('invitation/view','id'=>$model->id));
	echo '</span>';
?>

<?php
	echo '<h4>'.$model->title.'</h4>';
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'procuring_entity',
		'procurement_mode',
		'classification',
		'category',
		array(
			'name'=>'Approved Budget for the Contract (Php)',
			'value'=>Yii::app()->format->formatNumber($model->abc),
	),
		'contract_duration',
		'description',
		//'total_document_request',
		'area_of_delivery',
	),
));

$p = Organization::model()->findByPk($model->awardee);
echo '<span style="margin-left: 14%;"><b>Awarded to&nbsp;&nbsp;&nbsp</b></span>'.$p->name."<br>";
echo '<span style="margin-left: 14%;"><b>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></span>'.Yii::app()->format->formatNumber($model->amount)."<br>";

//$result = Bid::model()->findByPk($model->id);
//echo '<span style="margin-left: 17%;"><b>Amount&nbsp;&nbsp;&nbsp</b></span>'.$result->correct_calculated_price;
?>
