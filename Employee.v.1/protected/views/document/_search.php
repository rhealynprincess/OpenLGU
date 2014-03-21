<?php
/**
 * Manage Documents search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Document
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'document_id'); ?>
        <?php echo $form->textField($model, 'document_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'filename'); ?>
        <?php echo $form->textField($model, 'filename'); ?>
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
        <?php echo $form->label($model, 'last_modified'); ?>
        <?php echo $form->textField($model, 'last_modified'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->