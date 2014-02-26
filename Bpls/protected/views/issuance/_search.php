<?php
/* @var $this IssuanceController */
/* @var $model Issuance */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'issuance_id'); ?>
		<?php echo $form->textField($model,'issuance_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approval_id'); ?>
		<?php echo $form->textField($model,'approval_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_reg_num'); ?>
		<?php echo $form->textField($model,'business_reg_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_business_name'); ?>
		<?php echo $form->textField($model,'full_business_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'or_reference'); ?>
		<?php echo $form->textField($model,'or_reference'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'or_reference_date'); ?>
		<?php echo $form->textField($model,'or_reference_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'released_to'); ?>
		<?php echo $form->textField($model,'released_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scheduled_release_date'); ?>
		<?php echo $form->textField($model,'scheduled_release_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actual_release_date'); ?>
		<?php echo $form->textField($model,'actual_release_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issuance_barcode_ref'); ?>
		<?php echo $form->textField($model,'issuance_barcode_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issued_by_name'); ?>
		<?php echo $form->textField($model,'issued_by_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issued_by_id'); ?>
		<?php echo $form->textField($model,'issued_by_id'); ?>
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