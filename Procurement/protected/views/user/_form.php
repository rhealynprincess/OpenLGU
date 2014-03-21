<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo '<input type="checkBox" name="isAdmin"/>'; ?>
		<?php echo '<b>admin</b>'; ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('required'=>'required')); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('required'=>'required')); ?>
		<?php echo $form->error($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('required'=>'required')); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<?php echo $form->labelEx($model,'birth_date'); ?>
	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
		'id'=>'birth_date',
		'model'=>$model,
		'attribute'=>'birth_date',
		'name'=>'birth_date',
		'htmlOptions'=>array('required'=>'required'),
	)); 
	$this->endWidget();
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->dropDownList($model,'sex',array('Male','Female')); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('required'=>'required')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('required'=>'required')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<input type="password" name="confirmPassword" placeholder="confirm password" required="required"/>
	</div>

	<span class="error">
		<?php 
			if(isset($error)){
				if($error=='confirmPassword'){
					echo 'passwords do not match';
				}
				if($error=='usernameExist'){
					echo 'username already exist';
				};
			}
		?>
	</span>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->