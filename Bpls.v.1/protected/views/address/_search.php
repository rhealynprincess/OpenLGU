<?php
/* @var $this AddressController */
/* @var $model Address */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'address_id'); ?>
		<?php echo $form->textField($model,'address_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_num'); ?>
		<?php echo $form->textField($model,'unit_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdivision'); ?>
		<?php echo $form->textField($model,'subdivision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'barangay'); ?>
		<?php echo $form->textField($model,'barangay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sys_entry_date'); ?>
		<?php echo $form->textField($model,'sys_entry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_address'); ?>
		<?php echo $form->textField($model,'full_address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->