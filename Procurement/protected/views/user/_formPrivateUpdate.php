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
	
	<b>ORGANIZATION</b>
	<div class="row">
		<?php echo $form->labelEx($model2,'name'); ?>
		<?php echo $form->textField($model2,'name',array('required'=>'required','autofocus'=>'true')); ?>
		<?php echo $form->error($model2,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model2,'former_name'); ?>
		<?php echo $form->textField($model2,'former_name',array('required'=>'required')); ?>
		<?php echo $form->error($model2,'former_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'acronym'); ?>
		<?php echo $form->textField($model2,'acronym',array('required'=>'required')); ?>
		<?php echo $form->error($model2,'acronym'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'tax_id_number'); ?>
		<?php echo $form->textField($model2,'tax_id_number',array('required'=>'required')); ?>
		<?php echo $form->error($model2,'tax_id_number'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'website'); ?>
		<?php echo $form->textField($model2,'website',array('required'=>'required')); ?>
		<?php echo $form->error($model2,'website'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'description'); ?>
		<?php echo $form->textArea($model2,'description',array('required'=>'required')); ?>
		<?php echo $form->error($model2,'description'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model2,'country'); ?>
		<?php echo $form->textField($model2,'country'); ?>
		<?php echo $form->error($model2,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'region'); ?>
		<?php echo $form->dropDownList($model2,'region',$options->getRegions()); ?>
		<?php echo $form->error($model2,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'province'); ?>
		<?php echo $form->dropDownList($model2,'province',$options->getProvinces()); ?>
		<?php echo $form->error($model2,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'city_or_municipality'); ?>
		<?php echo $form->dropDownList($model2,'city_or_municipality',$options->getCitiesorMunicipalities()); ?>
		<?php echo $form->error($model2,'city_or_municipality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'street_address'); ?>
		<?php echo $form->textArea($model2,'street_address'); ?>
		<?php echo $form->error($model2,'street_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'zip_code'); ?>
		<?php echo $form->numberField($model2,'zip_code'); ?>
		<?php echo $form->error($model2,'zip_code'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'form'); ?>
		<?php echo $form->dropDownList($model3,'form',$options->getOrganizationForms()); ?>
		<?php echo $form->error($model3,'form'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model3,'type'); ?>
		<?php echo $form->dropDownList($model3,'type',$options->getOrganizationTypes()); ?>
		<?php echo $form->error($model3,'type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'business_category'); ?>
		<?php echo $form->dropDownList($model3,'business_category',$options->getBusinessCategories()); ?>
		<?php echo $form->error($model3,'business_category'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'dti_reg_number'); ?>
		<?php echo $form->textField($model3,'dti_reg_number',array('required'=>'required')); ?>
		<?php echo $form->error($model3,'dti_reg_number'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'sec_reg_number'); ?>
		<?php echo $form->textField($model3,'sec_reg_number',array('required'=>'required')); ?>
		<?php echo $form->error($model3,'sec_reg_number'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'cda_reg_number'); ?>
		<?php echo $form->textField($model3,'cda_reg_number',array('required'=>'required')); ?>
		<?php echo $form->error($model3,'cda_reg_number'); ?>
	</div>
	
	<?php echo $form->labelEx($model3,'incorporation_date'); ?>
	<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
		'id'=>'incorporation_date',
		'model'=>$model3,
		'attribute'=>'incorporation_date',
		'name'=>'incorporation_date',
		'htmlOptions'=>array('required'=>'required'),
	)); 
	$this->endWidget();
	?>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'employees_count'); ?>
		<?php echo $form->numberField($model3,'employees_count',array('required'=>'required')); ?>
		<?php echo $form->error($model3,'employees_count'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'prev_year_revenue'); ?>
		<?php echo $form->numberField($model3,'prev_year_revenue',array('required'=>'required')); ?>
		<?php echo $form->error($model3,'prev_year_revenue'); ?>
	</div>
	
	
	<b>CONTACT PERSON</b>
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

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $model->role; ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'account_status'); ?>
		<?php echo $form->dropDownList($model,'account_status',array('pending'=>'Pending', 'active'=>'Active')); ?>
		<?php echo $form->error($model,'account_status'); ?>
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
		<?php echo $form->textField($model,'country'); ?>
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
<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'organization_id'); ?>
		<?php echo $form->labelEx($model,'organization_id'); ?>
		<?php echo $form->error($model,'organization_id'); ?>
	</div>
-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
