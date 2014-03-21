<?php
/* @var $this ApprovalController */
/* @var $model Approval */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'approval_id'); ?>
		<?php echo $form->textField($model,'approval_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sic_code'); ?>
		<?php echo $form->textField($model,'sic_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'property_index_code'); ?>
		<?php echo $form->textField($model,'property_index_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'postal_code'); ?>
		<?php echo $form->textField($model,'postal_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_business_name'); ?>
		<?php echo $form->textField($model,'full_business_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approval_status'); ?>
		<?php echo $form->textField($model,'approval_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_reg_num'); ?>
		<?php echo $form->textField($model,'business_reg_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'action_date'); ?>
		<?php echo $form->textField($model,'action_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approval_date'); ?>
		<?php echo $form->textField($model,'approval_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issue_date'); ?>
		<?php echo $form->textField($model,'issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'next_renewal_date'); ?>
		<?php echo $form->textField($model,'next_renewal_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sys_entry_date'); ?>
		<?php echo $form->textField($model,'sys_entry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'account_holder_id'); ?>
		<?php echo $form->textField($model,'account_holder_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->