<?php
/* @var $this ProgressController */
/* @var $model Progress */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'progress-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
		<?php echo $form->error($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_information'); ?>
		<?php echo $form->textField($model,'business_information'); ?>
		<?php echo $form->error($model,'business_information'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'documents'); ?>
		<?php echo $form->textField($model,'documents'); ?>
		<?php echo $form->error($model,'documents'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assessment'); ?>
		<?php echo $form->textField($model,'assessment'); ?>
		<?php echo $form->error($model,'assessment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment'); ?>
		<?php echo $form->textField($model,'payment'); ?>
		<?php echo $form->error($model,'payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approval'); ?>
		<?php echo $form->textField($model,'approval'); ?>
		<?php echo $form->error($model,'approval'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->