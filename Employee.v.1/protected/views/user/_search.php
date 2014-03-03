<?php
/**
 * Manage Users search form.
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

<?php $form = $this->beginWidget('CActiveForm',  array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'user_id'); ?>
        <?php echo $form->textField($model, 'user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'role'); ?>
        <?php echo $form->textField($model, 'role'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'middle_name'); ?>
        <?php echo $form->textField($model, 'middle_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'create_date'); ?>
        <?php echo $form->textField($model, 'create_date'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->