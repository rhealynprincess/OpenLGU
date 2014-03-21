<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'taxpayer-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--START OF BASIC INFO-->
    <div class="view">
    	<h4 style="text-align:center"><b>Basic Information</b></h4>
		<div class="row">
			<?php echo $form->labelEx($model, 'email'); ?>
			<?php echo $form->textField($model, 'email', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'email'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model, 'password'); ?>
			<?php echo $form->passwordField($model, 'password', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'password'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model, 'rePassword'); ?>
			<?php echo $form->passwordField($model, 'rePassword', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'rePassword'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($model, 'role'); ?>
			<?php echo $form->dropDownList($model, 'role', $model::getRoleList(), array('prompt'=>'')); ?>
			<?php echo $form->error($model, 'role'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model, 'first_name'); ?>
			<?php echo $form->textField($model, 'first_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'first_name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'middle_name'); ?>
			<?php echo $form->textField($model, 'middle_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'middle_name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'last_name'); ?>
			<?php echo $form->textField($model, 'last_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'last_name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model, 'suffix_name'); ?>
			<?php echo $form->textField($model, 'suffix_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'suffix_name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model, 'dob_month'); ?>
			<?php echo $form->dropDownList($model, 'dob_month', $model::getMonthDrop(), array('prompt'=>'')); ?>
			<?php echo $form->error($model, 'dob_month'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model, 'dob_day'); ?>
			<?php echo $form->dropDownList($model, 'dob_day', $model::getDayDrop(), array('prompt'=>'')); ?>
			<?php echo $form->error($model, 'dob_day'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model, 'dob_year'); ?>
			<?php echo $form->dropDownList($model, 'dob_year', $model::getYearDrop(), array('prompt'=>'')); ?>
			<?php echo $form->error($model, 'dob_year'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model, 'civil_status'); ?>
			<?php echo $form->dropDownList($model, 'civil_status', $model::getCivilStatus(), array('prompt'=>'')); ?>
			<?php echo $form->error($model, 'civil_status'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model, 'gender'); ?>
			<?php echo $form->dropDownList($model, 'gender', $model::getGender(), array('prompt'=>'')); ?>
			<?php echo $form->error($model, 'gender'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'tin'); ?>
			<?php echo $form->textField($model, 'tin', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'tin'); ?>
		</div>
		
		
		<div>
			<?php echo $form->labelEx($model, 'application_date'); ?>
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'application_date',
				    
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
			<?php echo $form->error($model, 'application_date'); ?>
		</div>

    </div>
	<!--END OF BASIC INFO-->
	
	

	<div class="view">
		<h4 style="text-align:center"><b>Address</b></h4>
		
		<div>
			<?php echo $form->labelEx($adrModel, 'unit_num'); ?>
			<?php echo $form->textField($adrModel, 'unit_num', array('maxlength'=>32)); ?>
			<?php echo $form->error($adrModel, 'unit_num'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($adrModel, 'street'); ?>
			<?php echo $form->textField($adrModel, 'street', array('maxlength'=>32)); ?>
			<?php echo $form->error($adrModel, 'street'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($adrModel, 'subdivision'); ?>
			<?php echo $form->textField($adrModel, 'subdivision', array('maxlength'=>32)); ?>
			<?php echo $form->error($adrModel, 'subdivision'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($adrModel, 'barangay'); ?>
			<?php echo $form->textField($adrModel, 'barangay', array('maxlength'=>32)); ?>
			<?php echo $form->error($adrModel, 'barangay'); ?>
		</div>
	
	</div>
	<!--END OF ADDRESS-->	
	
	<!--START OF CONTACT REFERENCE-->	
	<div class="view">
		<h4 style="text-align:center"><b>Contact Reference</b></h4>
		
		<div>
			<?php echo $form->labelEx($crfModel, 'type'); ?>
			<?php echo $form->dropDownList($crfModel, 'type', $crfModel::getType(), array('prompt'=>'', 'id'=>'contactType')); ?>
			<?php echo $form->error($crfModel, 'type'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($crfModel, 'detail'); ?>
			<?php echo $form->textField($crfModel, 'detail', array('maxlength'=>32)); ?>
			<?php echo $form->error($crfModel, 'detail'); ?>
		</div>
		
	</div>
	<!--END OF CONTACT REFERENCE-->

	
	<!--START OF EMERGENCY CONTACT-->
	<div class="view">
		<h4 style="text-align:center"><b>Emergency Contact</b></h4>
		
		<div>
			<?php echo $form->labelEx($emcModel, 'first_name'); ?>
			<?php echo $form->textField($emcModel, 'first_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($emcModel, 'first_name'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($emcModel, 'middle_name'); ?>
			<?php echo $form->textField($emcModel, 'middle_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($emcModel, 'middle_name'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($emcModel, 'last_name'); ?>
			<?php echo $form->textField($emcModel, 'last_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($emcModel, 'last_name'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($emcModel, 'suffix_name'); ?>
			<?php echo $form->textField($emcModel, 'suffix_name', array('maxlength'=>32)); ?>
			<?php echo $form->error($emcModel, 'suffix_name'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($emcModel, 'contact_relationship'); ?>
			<?php echo $form->dropDownList($emcModel, 'contact_relationship', $emcModel::getRel(), array('prompt'=>'')); ?>
			<?php echo $form->error($emcModel, 'contact_relationship'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($emcModel, 'contact_num'); ?>
			<?php echo $form->textField($emcModel, 'contact_num', array('maxlength'=>32)); ?>
			<?php echo $form->error($emcModel, 'contact_num'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($emcModel, 'contact_email'); ?>
			<?php echo $form->textField($emcModel, 'contact_email', array('maxlength'=>32)); ?>
			<?php echo $form->error($emcModel, 'contact_email'); ?>
		</div>
	
	</div>
	<!--END OF EMERGENCY CONTACT-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
