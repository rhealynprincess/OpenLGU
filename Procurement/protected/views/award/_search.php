<?php
/* @var $this AwardController */
/* @var $model Award */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'procuring_entity'); ?>
		<?php echo $form->textField($model,'procuring_entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'procurement_mode'); ?>
		<?php echo $form->textField($model,'procurement_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classification'); ?>
		<?php echo $form->textField($model,'classification'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category'); ?>
		<?php echo $form->textField($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'abc'); ?>
		<?php echo $form->textField($model,'abc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_duration'); ?>
		<?php echo $form->textField($model,'contract_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_details'); ?>
		<?php echo $form->textField($model,'contact_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_published'); ?>
		<?php echo $form->textField($model,'date_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_published'); ?>
		<?php echo $form->textField($model,'time_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_last_modified'); ?>
		<?php echo $form->textField($model,'time_last_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_last_modified'); ?>
		<?php echo $form->textField($model,'date_last_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_closing'); ?>
		<?php echo $form->textField($model,'date_closing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_closing'); ?>
		<?php echo $form->textField($model,'time_closing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_document_request'); ?>
		<?php echo $form->textField($model,'total_document_request'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_of_delivery'); ?>
		<?php echo $form->textField($model,'area_of_delivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bidding_document'); ?>
		<?php echo $form->textField($model,'bidding_document'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lcb'); ?>
		<?php echo $form->textField($model,'lcb'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lcrb'); ?>
		<?php echo $form->textField($model,'lcrb'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'awardee'); ?>
		<?php echo $form->textField($model,'awardee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_approved'); ?>
		<?php echo $form->textField($model,'date_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_approved'); ?>
		<?php echo $form->textField($model,'time_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_person_id'); ?>
		<?php echo $form->textField($model,'contact_person_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->