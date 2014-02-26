<?php
/* @var $this PayModeController */
/* @var $model PayMode */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="view">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'update-pay-mode-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'amount_due'); ?>
		<?php echo $form->textField($model,'amount_due'); ?>
		<?php echo $form->error($model,'amount_due'); ?>
	</div>

	<div>
			<?php echo $form->labelEx($model, 'due_date'); ?>
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'due_date',
				    
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
			<?php echo $form->error($model, 'due_date'); ?>
		</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
