<?php
/* @var $this PaymentHolderController */
/* @var $model PaymentHolder */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="view">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-holder-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'account_holder_id'); ?>
		<?php echo $form->textField($model,'account_holder_id'); ?>
		<?php echo $form->error($model,'account_holder_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
		<?php echo $form->error($model,'business_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
