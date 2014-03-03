<?php
/**
 * Employee Education information form.
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
$educ = (!isset($_GET['row']))? new EmployeeEducation : EmployeeEducation::model()->findByPk($_GET['row']);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'education-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));

Yii::app()->clientScript->registerScript(uniqid(), "
    $('select[id$=level]').change(function(){
        if ($(this).val() == 'ELEMENTARY' || $(this).val() == 'SECONDARY') {
            $('input[id$=course]').val('').parent().css('display', 'none');
        }
        else {
            $('input[id$=course]').parent().css('display', 'block');
        }
    }).change();
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
     <div class="row">
        <?php echo $form->labelEx($educ, 'level'); ?>
        <?php echo $form->dropDownList($educ, 'level', $educ->levelList); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($educ, 'school_name'); ?>
        <?php echo $form->textField($educ, 'school_name'); ?>
        <?php echo $form->error($educ, 'school_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($educ, 'degree_course'); ?>
        <?php echo $form->textField($educ, 'degree_course'); ?>
        <?php echo $form->error($educ, 'degree_course'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($educ, 'year_graduated'); ?>
        <?php echo $form->textField($educ, 'year_graduated', array('maxlength'=>4)); ?>
        <?php echo $form->error($educ, 'year_graduated'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($educ, 'highest_grade'); ?>
        <?php echo $form->textField($educ, 'highest_grade'); ?>
        <?php echo $form->error($educ, 'highest_grade'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($educ, 'from_year'); ?>
        <?php echo $form->textField($educ, 'from_year', array('maxlength'=>4)); ?>
        <?php echo $form->error($educ, 'from_year'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($educ, 'to_year'); ?>
        <?php echo $form->textField($educ, 'to_year', array('maxlength'=>4)); ?>
        <?php echo $form->error($educ, 'to_year'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($educ, 'honors_received'); ?>
        <?php echo $form->textField($educ, 'honors_received'); ?>
        <?php echo $form->error($educ, 'honors_received'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($educ, 'attachment'); ?>
        <?php echo $form->dropDownList($educ, 'attachment', $model->getAttachments(), array('empty'=>'NONE')); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($educ->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->