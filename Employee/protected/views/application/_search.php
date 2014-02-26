<?php
/**
 * Manage Applications search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Application
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this ApplicationController */
/* @var $model Application */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'application_id'); ?>
		<?php echo $form->textField($model,'application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'positionTitle'); ?>
		<?php echo $form->textField($model,'positionTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fullName'); ?>
		<?php echo $form->textField($model,'fullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hrmoName'); ?>
		<?php echo $form->textField($model,'hrmoName'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requirement_status'); ?>
		<?php echo $form->textField($model,'requirement_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'psb_status'); ?>
		<?php echo $form->textField($model,'psb_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'psb_details'); ?>
		<?php echo $form->textField($model,'psb_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hrmo_status'); ?>
		<?php echo $form->textField($model,'hrmo_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_date'); ?>
		<?php echo $form->textField($model,'application_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approve_date'); ?>
		<?php echo $form->textField($model,'approve_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->