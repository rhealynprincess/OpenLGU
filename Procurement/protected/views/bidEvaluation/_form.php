<?php
/* @var $this BidEvaluationController */
/* @var $model BidEvaluation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bid-envelopes-opening-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->labelEx($model,'date_start'); ?>
	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
		'id'=>'date_start',
		'model'=>$model,
		'attribute'=>'date_start',
		'name'=>'date_start',
		'htmlOptions'=>array('required'=>'required', 'value'=>date('m/d/y')),
	)); 
	$this->endWidget();
	?>

	<?php echo $form->labelEx($model,'date_end'); ?>
	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
		'id'=>'date_end',
		'model'=>$model,
		'attribute'=>'date_end',
		'name'=>'date_end',
		'htmlOptions'=>array('required'=>'required', 'value'=>date('m/d/y')),
	)); 
	$this->endWidget();
	?>

	<div class="row">
	<?php echo $form->labelEx($model,'time_start'); ?>
	<?php
	//$time=CTimestamp::formatDate('h:m',time());
	echo '<input type="time" name="time_start" value="'.$model->time_start.'" required="required"/>'?>
	<?php echo $form->error($model,'time_start'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'time_end'); ?>
	<?php
	//$time=CTimestamp::formatDate('h:m',time());
	echo '<input type="time" name="time_end" value="'.$model->time_end.'" required="required"/>'?>
	<?php echo $form->error($model,'time_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details', array('maxlength' => 300, 'rows' => 8, 'cols' => 70)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
