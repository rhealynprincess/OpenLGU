<?php
/* @var $this PaymentHolderController */
/* @var $model PaymentHolder */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'payment_holder_id'); ?>
		<?php echo $form->textField($model,'payment_holder_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'account_holder_id'); ?>
		<?php echo $form->textField($model,'account_holder_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_id'); ?>
		<?php echo $form->textField($model,'business_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->