<?php
/* @var $this NtpController */
/* @var $model Ntp */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_notice'); ?>
		<?php echo $form->textField($model,'date_of_notice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_of_notice'); ?>
		<?php echo $form->textField($model,'time_of_notice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'details'); ?>
		<?php echo $form->textField($model,'details'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->