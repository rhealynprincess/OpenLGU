<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */
/* @var $form CActiveForm */



?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'application_date'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suffix_name'); ?>
		<?php echo $form->textField($model,'suffix_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob_month'); ?>
		<?php echo $form->dropDownList($model, 'dob_month', $model::getMonthDrop(), array('prompt'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob_day'); ?>
		<?php echo $form->dropDownList($model, 'dob_day', $model::getDayDrop(), array('prompt'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob_year'); ?>
		<?php echo $form->dropDownList($model, 'dob_year', $model::getYearDrop(), array('prompt'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'civil_status'); ?>
		<?php echo $form->dropDownList($model, 'civil_status', $model::getCivilStatus(), array('prompt'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->dropDownList($model, 'gender', $model::getGender(), array('prompt'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tin'); ?>
		<?php echo $form->textField($model,'tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->dropDownList($model, 'role', $model::getRoleList(), array('prompt'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sys_entry_date'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'model'=>$model,
				    'attribute'=>'sys_entry_date',
				    
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
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('id'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
