<?php
/**
 * User form.
 *
 * @package EmployeeInformationSystem
 * @subpackage User
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php
$form = $this->beginWidget('CActiveForm',  array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php if (!$model->isNewRecord) : ?>
    <div class="row">
        <label>&nbsp </label>
        <?php
            echo CHTML::button('View Profile', array(
                'onclick'=>"window.location = '"
                         . Yii::app()->createUrl("employee/view", array("id"=>$model->user_id))
                         . "'",
            ));
        ?>
    </div>
    <?php endif; ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'newPassword'); ?>
        <?php echo $form->passwordField($model, 'newPassword', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'newPassword'); ?>
    </div>

    <?php if ($model->isNewRecord) : ?>
    <div class="row">
        <?php echo $form->hiddenField($model, 'create_date', array('value'=>date('m/d/Y'))); ?>
        <?php echo $form->labelEx($model, 'confirmPassword'); ?>
        <?php echo $form->passwordField($model, 'confirmPassword', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'confirmPassword'); ?>
    </div>
    <?php endif; ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'role'); ?>
        <?php echo $form->dropDownList($model, 'role', $model->roleList); ?>
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

    <?php if ($model->isNewRecord) : ?>
    <div class="row">
        <?php echo $form->labelEx($employee, 'sex'); ?>
        <?php echo $form->dropDownList($employee, 'sex', $employee->gender); ?> 
    </div>
    <?php endif; ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', $model->statusList); ?>
    </div>
    
    <?php if (!$model->isNewRecord) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'create_date'); ?>
        <?php
            echo $form->textField($model, 'create_date', array(
                'readonly'=>'readonly',
                'value'=>date('m/d/Y', strtotime($model->create_date))
            ));
        ?>
    </div>
    <?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->