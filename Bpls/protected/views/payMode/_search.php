<?php
/* @var $this PayModeController */
/* @var $model PayMode */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pay_mode_id'); ?>
		<?php echo $form->textField($model,'pay_mode_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'due_date'); ?>
		<?php echo $form->textField($model,'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'or_num'); ?>
		<?php echo $form->textField($model,'or_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->