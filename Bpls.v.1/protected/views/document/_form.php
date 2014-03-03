<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="view">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	//'enableAjaxValidation'=>true,
	//'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true), //This is very important
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'barangay_clearance'); ?>
		<?php echo $form->fileField($model,'barangay_clearance'); ?>
		<?php echo $form->error($model,'barangay_clearance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zoning_clearance'); ?>
		<?php echo $form->fileField($model,'zoning_clearance'); ?>
		<?php echo $form->error($model,'zoning_clearance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sanitary_clearance'); ?>
		<?php echo $form->fileField($model,'sanitary_clearance'); ?>
		<?php echo $form->error($model,'sanitary_clearance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'occupancy_permit'); ?>
		<?php echo $form->fileField($model,'occupancy_permit'); ?>
		<?php echo $form->error($model,'occupancy_permit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fire_safety'); ?>
		<?php echo $form->fileField($model,'fire_safety'); ?>
		<?php echo $form->error($model,'fire_safety'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
