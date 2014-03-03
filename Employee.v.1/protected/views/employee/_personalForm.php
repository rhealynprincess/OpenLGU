<?php
/**
 * Employee Personal information form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'personal-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('ADMIN' != '" . Yii::app()->user->getState('role') . "') {
        $('input[type=text], textarea').each(function(){
            if ($(this).val()) {
                $(this).attr('disabled', 'disabled');
            }
        });
    }
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row csid">
        <?php echo $form->labelEx($model, 'cs_id'); ?>
        <?php echo $form->textField($model, 'cs_id'); ?>
        <?php echo $form->error($model, 'cs_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birthday'); ?>
        <?php
            $bday = ($model->birthday) ? date('m/d/Y', strtotime($model->birthday)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array( 
                'name'=>CHtml::activeName($model, 'birthday'), 
                'value'=>$bday, 
                'options'=>array(
                    'changeYear'=>true, 
                    'minDate'=>'-65Y', 
                    'maxDate'=>'-18Y', 
                )
            ));
        ?>
        <?php echo $form->error($model, 'birthday'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birthplace'); ?>
        <?php echo $form->textField($model, 'birthplace'); ?>
        <?php echo $form->error($model, 'birthplace'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sex'); ?>
        <?php echo $form->dropDownList($model, 'sex', $model->gender); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'civil_status'); ?>
        <?php echo $form->dropDownList($model, 'civil_status', $model->civStatus); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'citizenship'); ?>
        <?php echo $form->textField($model, 'citizenship'); ?>
        <?php echo $form->error($model, 'citizenship'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'height'); ?>
        <?php echo $form->textField($model, 'height', array('maxlength'=>3)); ?>
        <?php echo $form->error($model, 'height'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'weight'); ?>
        <?php echo $form->textField($model, 'weight', array('maxlength'=>3)); ?>
        <?php echo $form->error($model, 'weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'blood_type'); ?>
        <?php echo $form->dropDownList($model, 'blood_type', $model->blood); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'gsis_id'); ?>
        <?php echo $form->textField($model, 'gsis_id'); ?>
        <?php echo $form->error($model, 'gsis_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'pagibig_id'); ?>
        <?php echo $form->textField($model, 'pagibig_id'); ?>
        <?php echo $form->error($model, 'pagibig_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'philhealth_id'); ?>
        <?php echo $form->textField($model, 'philhealth_id'); ?>
        <?php echo $form->error($model, 'philhealth_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sss_id'); ?>
        <?php echo $form->textField($model, 'sss_id'); ?>
        <?php echo $form->error($model, 'sss_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'residential_address'); ?>
        <?php echo $form->textField($model, 'residential_address'); ?>
        <?php echo $form->error($model, 'residential_address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'residential_zip'); ?>
        <?php echo $form->textField($model, 'residential_zip', array('maxlength'=>4)); ?>
        <?php echo $form->error($model, 'residential_zip'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'residential_tel_no'); ?>
        <?php echo $form->textField($model, 'residential_tel_no'); ?>
        <?php echo $form->error($model, 'residential_tel_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'permanent_address'); ?>
        <?php echo $form->textField($model, 'permanent_address'); ?>
        <?php echo $form->error($model, 'permanent_address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'permanent_zip'); ?>
        <?php echo $form->textField($model, 'permanent_zip', array('maxlength'=>4)); ?>
        <?php echo $form->error($model, 'permanent_zip'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'permanent_tel_no'); ?>
        <?php echo $form->textField($model, 'permanent_tel_no'); ?>
        <?php echo $form->error($model, 'permanent_tel_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cellphone_no'); ?>
        <?php echo $form->textField($model, 'cellphone_no'); ?>
        <?php echo $form->error($model, 'cellphone_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'agency_emp_no'); ?>
        <?php echo $form->textField($model, 'agency_emp_no'); ?>
        <?php echo $form->error($model, 'agency_emp_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tin'); ?>
        <?php echo $form->textField($model, 'tin'); ?>
        <?php echo $form->error($model, 'tin'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->