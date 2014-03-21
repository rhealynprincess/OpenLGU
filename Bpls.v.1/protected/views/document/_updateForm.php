<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	//'enableAjaxValidation'=>true,
	//'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true), //This is very important
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>
<div class="view">
	<h4 style="text-align:center"><b>Update Documents' Statuses</b></h4>
	<div class="row">
		<?php echo $form->labelEx($model,'barangay_status'); ?>
		<?php echo $form->dropDownList($model,'barangay_status', Document::model()->getStatusList()); ?>
		<?php echo $form->error($model,'barangay_status'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'zoning_status'); ?>
		<?php echo $form->dropDownList($model,'zoning_status', Document::model()->getStatusList()); ?>
		<?php echo $form->error($model,'zoning_status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sanitary_status'); ?>
		<?php echo $form->dropDownList($model,'sanitary_status', Document::model()->getStatusList()); ?>
		<?php echo $form->error($model,'sanitary_status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'occupancy_status'); ?>
		<?php echo $form->dropDownList($model,'occupancy_status', Document::model()->getStatusList()); ?>
		<?php echo $form->error($model,'occupancy_status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fire_safety_status'); ?>
		<?php echo $form->dropDownList($model,'fire_safety_status', Document::model()->getStatusList()); ?>
		<?php echo $form->error($model,'fire_safety_status'); ?>
	</div>

</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
