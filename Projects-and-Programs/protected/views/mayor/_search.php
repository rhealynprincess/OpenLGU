<?php
/* @var $this MayorController */
/* @var $model Mayor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'project_program_title'); ?>
		<?php echo $form->textField($model,'project_program_title',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'source_of_fund'); ?>
		<?php echo $form->textField($model,'source_of_fund',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_started'); ?>
		<?php echo $form->textField($model,'date_started'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_completed'); ?>
		<?php echo $form->textField($model,'date_completed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contractor'); ?>
		<?php echo $form->textField($model,'contractor',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sector'); ?>
		<?php echo $form->textField($model,'sector',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_program_no'); ?>
		<?php echo $form->textField($model,'project_program_no'); ?>
	</div>

		<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>100)); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
