<?php
/* @var $this EmergencyContactController */
/* @var $model EmergencyContact */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'emergency_id'); ?>
		<?php echo $form->textField($model,'emergency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suffix_name'); ?>
		<?php echo $form->textField($model,'suffix_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_num'); ?>
		<?php echo $form->textField($model,'contact_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_relationship'); ?>
		<?php echo $form->textField($model,'contact_relationship'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sys_entry_date'); ?>
		<?php echo $form->textField($model,'sys_entry_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->