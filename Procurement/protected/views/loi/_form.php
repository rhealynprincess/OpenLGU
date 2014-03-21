<?php
/* @var $this LoiController */
/* @var $model Loi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loi-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invitation_id'); ?>
		<?php echo $form->textField($model,'invitation_id'); ?>
		<?php echo $form->error($model,'invitation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_submitted'); ?>
		<?php echo $form->textField($model,'date_submitted'); ?>
		<?php echo $form->error($model,'date_submitted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_submitted'); ?>
		<?php echo $form->textField($model,'time_submitted'); ?>
		<?php echo $form->error($model,'time_submitted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->