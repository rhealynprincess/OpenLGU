<?php
/**
 * Employee Civil Service Eligibility information form.
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
$cse = (!isset($_GET['row'])) ? new EmployeeEligibility : EmployeeEligibility::model()->findByPk($_GET['row']);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'cse-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
     <div class="row">
        <?php echo $form->labelEx($cse, 'career_service'); ?>
        <?php echo $form->textField($cse, 'career_service'); ?>
        <?php echo $form->error($cse, 'career_service'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($cse, 'rating'); ?>
        <?php echo $form->textField($cse, 'rating', array('maxLength'=>6)); ?>
        <?php echo $form->error($cse, 'rating'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($cse, 'date_of_exam'); ?>
        <?php
            $exam = ($cse->date_of_exam) ? date('m/d/Y', strtotime($cse->date_of_exam)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($cse, 'date_of_exam'), 
                'value'=>$exam, 
                'options'=>array(
                    'changeYear'=>true, 
                    'minDate'=>'-65Y', 
                    'maxDate'=>'0', 
                )
            ));
        ?>
        <?php echo $form->error($cse, 'date_of_exam'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($cse, 'place_of_exam'); ?>
        <?php echo $form->textField($cse, 'place_of_exam'); ?>
        <?php echo $form->error($cse, 'place_of_exam'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($cse, 'license_no'); ?>
        <?php echo $form->textField($cse, 'license_no'); ?>
        <?php echo $form->error($cse, 'license_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($cse, 'license_release_date'); ?>
        <?php
            $exam = ($cse->license_release_date) ? date('m/d/Y', strtotime($cse->license_release_date)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($cse, 'license_release_date'), 
                'id'=>uniqid(), 
                'value'=>$exam, 
                'options'=>array(
                    'changeYear'=>true, 
                    'minDate'=>'-65Y', 
                    'maxDate'=>'0', 
                )
            ));
        ?>
        <?php echo $form->error($cse, 'license_release_date'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($cse, 'attachment'); ?>
        <?php echo $form->dropDownList($cse, 'attachment', $model->getAttachments(), array('empty'=>'NONE')); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($cse->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->