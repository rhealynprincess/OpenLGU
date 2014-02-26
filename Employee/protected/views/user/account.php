<?php
/**
 * Accounts Settings page to change email and password.
 *
 * @package EmployeeInformationSystem
 * @subpackage User
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - Account Settings';

$this->breadcrumbs = array(
    'Profile'=>array('site/profile'),
    'Account Settings',
);

$form = $this->beginWidget('CActiveForm',  array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href$=profile]').parent().addClass('active');
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Account Settings</h1>

<div class="wide form">

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php
        foreach (Yii::app()->user->getFlashes() as $key=>$message) {
            echo "<div class='flash-$key'>$message</div>";
        }
    ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'newEmail'); ?>
        <?php echo $form->textField($model, 'newEmail', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'newEmail'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'oldPassword'); ?>
        <?php echo $form->passwordField($model, 'oldPassword', array('maxlength'=>32)); ?>
        <?php echo $form->error($model, 'oldPassword'); ?>
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
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->