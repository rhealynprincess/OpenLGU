<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $options=new OptionRecord();?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('required'=>'required','autofocus'=>'true')); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $model->role; ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
	
	<?php
	/* 
	<div class="row">
		<?php echo $form->labelEx($model,'birth_date'); ?>
		<?php echo $form->dateField($model,'birth_date',array('required'=>'required')); ?>
		<?php echo $form->error($model,'birth_date'); ?>
	</div>
	*/?>
	
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
		<?php echo $form->dropDownList($model,'sex',$options->getSex()); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $model->country; ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->dropDownList($model,'region',$options->getRegions()); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->dropDownList($model,'province',$options->getProvinces()); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_or_municipality'); ?>
		<?php echo $form->dropDownList($model,'city_or_municipality',$options->getCitiesorMunicipalities()); ?>
		<?php echo $form->error($model,'city_or_municipality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street_address'); ?>
		<?php echo $form->textArea($model,'street_address'); ?>
		<?php echo $form->error($model,'street_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->numberField($model,'zip_code'); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('required'=>'required')); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_add'); ?>
		<?php echo $form->emailField($model,'email_add'); ?>
		<?php echo $form->error($model,'email_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_num'); ?>
		<?php echo $form->textField($model,'tel_num'); ?>
		<?php echo $form->error($model,'tel_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax_num'); ?>
		<?php echo $form->textField($model,'fax_num'); ?>
		<?php echo $form->error($model,'fax_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_contact_details'); ?>
		<?php echo $form->textArea($model,'other_contact_details'); ?>
		<?php echo $form->error($model,'other_contact_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_id'); ?>
		<?php echo Organization::model()->findByPk(0)->name; ?>
		<?php echo $form->error($model,'organization_id'); ?>
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
