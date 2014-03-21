<?php
/* @var $this AwardingController */
/* @var $model Awarding */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'awarding-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>"multipart/form-data"),
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx($model,'date_awarded'); ?>
	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
		'id'=>'date_start',
		'model'=>$model,
		'attribute'=>'date_awarded',
		'name'=>'date_start',
		'htmlOptions'=>array('required'=>'required', 'value'=>date('m/d/y')),
	)); 
	$this->endWidget();
	?>

	<div class="row">
	<?php echo $form->labelEx($model,'time_awarded'); ?>
	<?php echo '<input type="time" name="time_awarded" value="'.$model->time_awarded.'" required="required"/>'?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details', array('maxlength' => 300, 'rows' => 8, 'cols' => 70)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

		<!-- <?php echo '<input accept="application/pdf" type="file" name="file" id="file" required="required"/>';?> -->
		

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
