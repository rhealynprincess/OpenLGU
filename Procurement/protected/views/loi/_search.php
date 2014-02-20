<?php
/* @var $this LoiController */
/* @var $model Loi */
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
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invitation_id'); ?>
		<?php echo $form->textField($model,'invitation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_submitted'); ?>
		<?php echo $form->textField($model,'date_submitted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_submitted'); ?>
		<?php echo $form->textField($model,'time_submitted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->