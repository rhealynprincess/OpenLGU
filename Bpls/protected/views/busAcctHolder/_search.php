<?php
/* @var $this BusAcctHolderController */
/* @var $model BusAcctHolder */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'account_holder_id'); ?>
		<?php echo $form->textField($model,'account_holder_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_date'); ?>
		<?php echo $form->textField($model,'application_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->