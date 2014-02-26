<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'document_id'); ?>
		<?php echo $form->textField($model,'document_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'barangay_clearance'); ?>
		<?php echo $form->textField($model,'barangay_clearance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'barangay_status'); ?>
		<?php echo $form->textField($model,'barangay_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zoning_clearance'); ?>
		<?php echo $form->textField($model,'zoning_clearance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zoning_status'); ?>
		<?php echo $form->textField($model,'zoning_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sanitary_clearance'); ?>
		<?php echo $form->textField($model,'sanitary_clearance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sanitary_status'); ?>
		<?php echo $form->textField($model,'sanitary_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'occupancy_permit'); ?>
		<?php echo $form->textField($model,'occupancy_permit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'occupancy_status'); ?>
		<?php echo $form->textField($model,'occupancy_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fire_safety'); ?>
		<?php echo $form->textField($model,'fire_safety'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fire_safety_status'); ?>
		<?php echo $form->textField($model,'fire_safety_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->