<?php
/* @var $this ApprovalController */
/* @var $model Approval */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="view">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'update-approval-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sic_code'); ?>
		<?php echo $form->textField($model,'sic_code'); ?>
		<?php echo $form->error($model,'sic_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks'); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_date'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'action_date',
				    
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
		<?php echo $form->error($model,'action_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approval_date'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'approval_date',
				    
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
		<?php echo $form->error($model,'approval_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_date'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'issue_date',
				    
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
		<?php echo $form->error($model,'issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next_renewal_date'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'next_renewal_date',
				    
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
		<?php echo $form->error($model,'next_renewal_date'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
