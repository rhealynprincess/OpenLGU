<?php
/* @var $this MayorController */
/* @var $model Mayor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mayor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_program_title'); ?>
		<?php echo $form->textField($model,'project_program_title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'project_program_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source_of_fund'); ?>
		<?php echo $form->textField($model,'source_of_fund',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'source_of_fund'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_started'); ?>
		<?php echo $form->textField($model,'date_started'); ?>
		<?php echo $form->error($model,'date_started'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_completed'); ?>
		<?php echo $form->textField($model,'date_completed'); ?>
		<?php echo $form->error($model,'date_completed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contractor'); ?>
		<?php echo $form->textField($model,'contractor',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contractor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sector'); ?>
		<?php echo $form->textField($model,'sector',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
