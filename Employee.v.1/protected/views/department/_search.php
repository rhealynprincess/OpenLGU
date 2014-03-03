<?php
/**
 * Manage Departments search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Department
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'department_id'); ?>
        <?php echo $form->textField($model, 'department_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fullName'); ?>
        <?php echo $form->textField($model, 'fullName'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'details'); ?>
        <?php echo $form->textField($model, 'details'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->