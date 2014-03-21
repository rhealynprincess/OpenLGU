<?php
/**
 * Employee Other information form.
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
    'id'=>'other-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'skills_hobbies'); ?>
        <?php echo $form->textArea($model, 'skills_hobbies'); ?>
        <?php echo $form->error($model, 'skills_hobbies'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'non_academic_distinctions'); ?>
        <?php echo $form->textArea($model, 'non_academic_distinctions'); ?>
        <?php echo $form->error($model, 'non_academic_distinctions'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'organizations'); ?>
        <?php echo $form->textArea($model, 'organizations'); ?>
        <?php echo $form->error($model, 'organizations'); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->