<?php
/**
 * Manage Employees search form.
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

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'cs_id'); ?>
        <?php echo $form->textField($model, 'cs_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'birthday'); ?>
        <?php echo $form->textField($model, 'birthday'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'birthplace'); ?>
        <?php echo $form->textField($model, 'birthplace'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'civil_status'); ?>
        <?php echo $form->textField($model, 'civil_status'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'citizenship'); ?>
        <?php echo $form->textField($model, 'citizenship'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'height'); ?>
        <?php echo $form->textField($model, 'height'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'weight'); ?>
        <?php echo $form->textField($model, 'weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'blood_type'); ?>
        <?php echo $form->textField($model, 'blood_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'gsis_id'); ?>
        <?php echo $form->textField($model, 'gsis_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'pagibig_id'); ?>
        <?php echo $form->textField($model, 'pagibig_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'philhealth_id'); ?>
        <?php echo $form->textField($model, 'philhealth_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'sss_id'); ?>
        <?php echo $form->textField($model, 'sss_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'residential_address'); ?>
        <?php echo $form->textField($model, 'residential_address'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'residential_zip'); ?>
        <?php echo $form->textField($model, 'residential_zip'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'residential_tel_no'); ?>
        <?php echo $form->textField($model, 'residential_tel_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'permanent_address'); ?>
        <?php echo $form->textField($model, 'permanent_address'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'permanent_zip'); ?>
        <?php echo $form->textField($model, 'permanent_zip'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'permanent_tel_no'); ?>
        <?php echo $form->textField($model, 'permanent_tel_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'cellphone_no'); ?>
        <?php echo $form->textField($model, 'cellphone_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'agency_emp_no'); ?>
        <?php echo $form->textField($model, 'agency_emp_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tin'); ?>
        <?php echo $form->textField($model, 'tin'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'skills_hobbies'); ?>
        <?php echo $form->textField($model, 'skills_hobbies'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'non_academic_distinctions'); ?>
        <?php echo $form->textField($model, 'non_academic_distinctions'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'organizations'); ?>
        <?php echo $form->textField($model, 'organizations'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->