<?php
/**
 * Employee Family information form.
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
    'id'=>'family-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('ADMIN' != '" . Yii::app()->user->getState('role') . "') {
        $('input[type=text], select, textarea').each(function(){
            if ($(this).val()) {
                $(this).attr('disabled', 'disabled');
            }
        });
    }
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php if ($model->civil_status != 'SINGLE') : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_first_name'); ?>
        <?php echo $form->textField($model, 'spouse_first_name'); ?>
        <?php echo $form->error($model, 'spouse_first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_middle_name'); ?>
        <?php echo $form->textField($model, 'spouse_middle_name'); ?>
        <?php echo $form->error($model, 'spouse_middle_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_last_name'); ?>
        <?php echo $form->textField($model, 'spouse_last_name'); ?>
        <?php echo $form->error($model, 'spouse_last_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_occupation'); ?>
        <?php echo $form->textField($model, 'spouse_occupation'); ?>
        <?php echo $form->error($model, 'spouse_occupation'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_employer'); ?>
        <?php echo $form->textField($model, 'spouse_employer'); ?>
        <?php echo $form->error($model, 'spouse_employer'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_business_addr'); ?>
        <?php echo $form->textField($model, 'spouse_business_addr'); ?>
        <?php echo $form->error($model, 'spouse_business_addr'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spouse_tel_no'); ?>
        <?php echo $form->textField($model, 'spouse_tel_no'); ?>
        <?php echo $form->error($model, 'spouse_tel_no'); ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'father_first_name'); ?>
        <?php echo $form->textField($model, 'father_first_name'); ?>
        <?php echo $form->error($model, 'father_first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'father_middle_name'); ?>
        <?php echo $form->textField($model, 'father_middle_name'); ?>
        <?php echo $form->error($model, 'father_middle_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'father_last_name'); ?>
        <?php echo $form->textField($model, 'father_last_name'); ?>
        <?php echo $form->error($model, 'father_last_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mother_first_name'); ?>
        <?php echo $form->textField($model, 'mother_first_name'); ?>
        <?php echo $form->error($model, 'mother_first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mother_middle_name'); ?>
        <?php echo $form->textField($model, 'mother_middle_name'); ?>
        <?php echo $form->error($model, 'mother_middle_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mother_last_name'); ?>
        <?php echo $form->textField($model, 'mother_last_name'); ?>
        <?php echo $form->error($model, 'mother_last_name'); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->