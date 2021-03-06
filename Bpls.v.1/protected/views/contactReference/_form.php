<?php
/* @var $this ContactReferenceController */
/* @var $crfModel ContactReference */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-reference-form',
	'enableAjaxValidation'=>true,
)); ?>

	

	<?php echo $form->errorSummary($crfModel); ?>
	
	<div class="view">
		<h4 style="text-align:center"><b>Add new Contact Reference</b></h4>
		<p class="note">Fields with <span class="required">*</span> are required.</p>
		
		<div class="row">
			<?php echo $form->labelEx($crfModel,'type'); ?>
			<?php echo $form->dropDownList($crfModel,'type', $crfModel::getType(), array('prompt'=>'')); ?>
			<?php echo $form->error($crfModel,'type'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($crfModel,'detail'); ?>
			<?php echo $form->textField($crfModel,'detail'); ?>
			<?php echo $form->error($crfModel,'detail'); ?>
		</div>

	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($crfModel->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
