<?php
/* @var $this AwardController */
/* @var $model Award */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'award-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'procuring_entity'); ?>
		<?php echo $form->textField($model,'procuring_entity'); ?>
		<?php echo $form->error($model,'procuring_entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'procurement_mode'); ?>
		<?php echo $form->textField($model,'procurement_mode'); ?>
		<?php echo $form->error($model,'procurement_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classification'); ?>
		<?php echo $form->textField($model,'classification'); ?>
		<?php echo $form->error($model,'classification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category'); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abc'); ?>
		<?php echo $form->textField($model,'abc'); ?>
		<?php echo $form->error($model,'abc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_duration'); ?>
		<?php echo $form->textField($model,'contract_duration'); ?>
		<?php echo $form->error($model,'contract_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_details'); ?>
		<?php echo $form->textField($model,'contact_details'); ?>
		<?php echo $form->error($model,'contact_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_published'); ?>
		<?php echo $form->textField($model,'date_published'); ?>
		<?php echo $form->error($model,'date_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_published'); ?>
		<?php echo $form->textField($model,'time_published'); ?>
		<?php echo $form->error($model,'time_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_last_modified'); ?>
		<?php echo $form->textField($model,'time_last_modified'); ?>
		<?php echo $form->error($model,'time_last_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_last_modified'); ?>
		<?php echo $form->textField($model,'date_last_modified'); ?>
		<?php echo $form->error($model,'date_last_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_closing'); ?>
		<?php echo $form->textField($model,'date_closing'); ?>
		<?php echo $form->error($model,'date_closing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_closing'); ?>
		<?php echo $form->textField($model,'time_closing'); ?>
		<?php echo $form->error($model,'time_closing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_document_request'); ?>
		<?php echo $form->textField($model,'total_document_request'); ?>
		<?php echo $form->error($model,'total_document_request'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area_of_delivery'); ?>
		<?php echo $form->textField($model,'area_of_delivery'); ?>
		<?php echo $form->error($model,'area_of_delivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bidding_document'); ?>
		<?php echo $form->textField($model,'bidding_document'); ?>
		<?php echo $form->error($model,'bidding_document'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lcb'); ?>
		<?php echo $form->textField($model,'lcb'); ?>
		<?php echo $form->error($model,'lcb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lcrb'); ?>
		<?php echo $form->textField($model,'lcrb'); ?>
		<?php echo $form->error($model,'lcrb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'awardee'); ?>
		<?php echo $form->textField($model,'awardee'); ?>
		<?php echo $form->error($model,'awardee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_approved'); ?>
		<?php echo $form->textField($model,'date_approved'); ?>
		<?php echo $form->error($model,'date_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_approved'); ?>
		<?php echo $form->textField($model,'time_approved'); ?>
		<?php echo $form->error($model,'time_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_person_id'); ?>
		<?php echo $form->textField($model,'contact_person_id'); ?>
		<?php echo $form->error($model,'contact_person_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->