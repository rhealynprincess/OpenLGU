<?php
/* @var $this AddressController */
/* @var $adrModel Address */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'address-form',
	'enableAjaxValidation'=>true,
)); ?>

	

	<?php echo $form->errorSummary($adrModel); ?>
	<div class="view">
		<h4 style="text-align:center"><b>Add new Address</b></h4>
		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<div class="row">
			<?php echo $form->labelEx($adrModel,'unit_num'); ?>
			<?php echo $form->textField($adrModel,'unit_num'); ?>
			<?php echo $form->error($adrModel,'unit_num'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($adrModel,'street'); ?>
			<?php echo $form->textField($adrModel,'street'); ?>
			<?php echo $form->error($adrModel,'street'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($adrModel,'subdivision'); ?>
			<?php echo $form->textField($adrModel,'subdivision'); ?>
			<?php echo $form->error($adrModel,'subdivision'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($adrModel,'barangay'); ?>
			<?php echo $form->textField($adrModel,'barangay'); ?>
			<?php echo $form->error($adrModel,'barangay'); ?>
		</div>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($adrModel->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
