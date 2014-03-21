<?php
/* @var $this NtpController */
/* @var $model Ntp */
/* @var $form CActiveForm */
?>
<?php
/* @var $this PostQualificationController */
/* @var $model PostQualification */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ntp-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>"multipart/form-data"),
)); ?>


	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx($model,'date_of_notice'); ?>
	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
		'id'=>'date_of_notice',
		'model'=>$model,
		'attribute'=>'date_of_notice',
		'name'=>'date_of_notice',
		'htmlOptions'=>array('required'=>'required', 'value'=>date('m/d/y')),
	)); 
	$this->endWidget();
	?>

	<div class="row">
	<?php echo $form->labelEx($model,'time_of_notice'); ?>
	<?php echo '<input type="time" name="time_of_notice" value="'.$model->time_of_notice.'" required="required"/>'?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details', array('maxlength' => 300, 'rows' => 8, 'cols' => 70)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<?php echo '<input accept="application/pdf" type="file" name="file" id="file" required="required"/>';?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
