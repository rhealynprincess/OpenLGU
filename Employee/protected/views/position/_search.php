<?php
/**
 * Manage Positions search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Position
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this PositionController */
/* @var $model Position */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'position_id'); ?>
        <?php echo $form->textField($model, 'position_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'departmentName'); ?>
        <?php echo $form->textField($model, 'departmentName'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title'); ?>
        <?php echo $form->textField($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'rank'); ?>
        <?php echo $form->textField($model, 'rank'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'level'); ?>
        <?php echo $form->textField($model, 'level'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'salary'); ?>
        <?php echo $form->textField($model, 'salary'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fullName'); ?>
        <?php echo $form->textField($model, 'fullName'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'details'); ?>
        <?php echo $form->textField($model, 'details'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'location'); ?>
        <?php echo $form->textField($model, 'location'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'education'); ?>
        <?php echo $form->textField($model, 'education'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'experience'); ?>
        <?php echo $form->textField($model, 'experience'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'training'); ?>
        <?php echo $form->textField($model, 'training'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'eligibility'); ?>
        <?php echo $form->textField($model, 'eligibility'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'role'); ?>
        <?php echo $form->textField($model, 'role'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'appoint_date'); ?>
        <?php echo $form->textField($model, 'appoint_date', array('id'=>uniqid())); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'vacancy_date'); ?>
        <?php echo $form->textField($model, 'vacancy_date', array('id'=>uniqid())); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->