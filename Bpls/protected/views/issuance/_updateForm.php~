<?php
/* @var $this IssuanceController */
/* @var $model Issuance */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="view">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issuance-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'released_to'); ?>
		<?php echo $form->textField($model,'released_to'); ?>
		<?php echo $form->error($model,'released_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actual_release_date'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'actual_release_date',
				    
				    // additional javascript options for the date picker plugin
				    'options'=>array(
				        'showAnim'=>'fold',
				        'dateFormat'=>'yy-mm-dd',
				    ),
				    'htmlOptions'=>array(
				        'style'=>'height:20px;'
				    ),
				));
			?>
		<?php echo $form->error($model,'actual_release_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issuance_barcode_ref'); ?>
		<?php echo $form->textField($model,'issuance_barcode_ref'); ?>
		<?php echo $form->error($model,'issuance_barcode_ref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issued_by_name'); ?>
		<?php echo $form->textField($model,'issued_by_name'); ?>
		<?php echo $form->error($model,'issued_by_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issued_by_id'); ?>
		<?php echo $form->textField($model,'issued_by_id'); ?>
		<?php echo $form->error($model,'issued_by_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
