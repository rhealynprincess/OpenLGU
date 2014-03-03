<?php
/* @var $this ProgressController */
/* @var $model Progress */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="view">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'update-progress-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<?php if((Yii::app()->user->role == 'BPLO') || (Yii::app()->user->role == 'ADMIN')){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'business_information'); ?>
		<?php echo $form->dropDownList($model, 'business_information', $model::statusList(), array('prompt'=>''));?>
		<?php echo $form->error($model,'business_information'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'documents'); ?>
		<?php echo $form->dropDownList($model, 'documents', $model::statusList(), array('prompt'=>'')); ?>
		<?php echo $form->error($model,'documents'); ?>
	</div>

<?php } ?>

<?php if((Yii::app()->user->role == 'ASSESSOR') || (Yii::app()->user->role == 'ADMIN')){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'assessment'); ?>
		<?php echo $form->dropDownList($model, 'assessment', $model::statusList(), array('prompt'=>'')); ?>
		<?php echo $form->error($model,'assessment'); ?>
	</div>

<?php } ?>


<?php if((Yii::app()->user->role == 'TREASURY') || (Yii::app()->user->role == 'ADMIN')){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'payment'); ?>
		<?php echo $form->dropDownList($model, 'payment', $model::statusList(), array('prompt'=>'')); ?>
		<?php echo $form->error($model,'payment'); ?>
	</div>
<?php } ?>

<?php if((Yii::app()->user->role == 'LCE') || (Yii::app()->user->role == 'ADMIN')){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'approval'); ?>
		<?php echo $form->dropDownList($model, 'approval', $model::statusList(), array('prompt'=>'')); ?>
		<?php echo $form->error($model,'approval'); ?>
	</div>

<?php } ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
