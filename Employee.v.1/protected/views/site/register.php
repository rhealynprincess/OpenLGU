<?php
/**
 * Site Registration page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this SiteController */
/* @var $model User */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array(
    'Register',
);
?>

<h1>Register</h1>
<div class="wide form">

<?php
$form = $this->beginWidget('CActiveForm',  array(
    'id'=>'register-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php
        foreach (Yii::app()->user->getFlashes() as $key => $message) {
            echo "<div class='flash-$key'>$message</div>";
        }
    ?>
    
    <div class="row">
        <?php echo $form->hiddenField($model, 'role', array('value'=>'APPLICANT')); ?>
        <?php echo $form->hiddenField($model, 'status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'create_date', array('value'=>date('m/d/Y'))); ?>
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'newPassword'); ?>
        <?php echo $form->passwordField($model, 'newPassword', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'newPassword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'confirmPassword'); ?>
        <?php echo $form->passwordField($model, 'confirmPassword', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'confirmPassword'); ?>
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
        <?php echo $form->labelEx($employee, 'sex'); ?>
        <?php echo $form->dropDownList($employee, 'sex', $employee->gender); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Create'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->