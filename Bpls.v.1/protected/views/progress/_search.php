<?php
/* @var $this ProgressController */
/* @var $model Progress */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'progress_id'); ?>
		<?php echo $form->textField($model,'progress_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_information'); ?>
		<?php echo $form->textField($model,'business_information'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documents'); ?>
		<?php echo $form->textField($model,'documents'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assessment'); ?>
		<?php echo $form->textField($model,'assessment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment'); ?>
		<?php echo $form->textField($model,'payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approval'); ?>
		<?php echo $form->textField($model,'approval'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->