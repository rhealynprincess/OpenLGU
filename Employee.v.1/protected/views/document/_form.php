<?php
/**
 * Document form.
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

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'document-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php if (Yii::app()->user->hasFlash('success')) : ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
    <?php endif; ?>

    <?php if (!$model->isNewRecord) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'oldName'); ?>
        <?php echo $form->textField($model, 'oldName', array('value'=>$model->filename, 'readonly'=>'readonly')); ?>
    </div>    
    <?php endif; ?>
    
    <div class="row">
        <?php echo $form->hiddenField($model, 'owner_id', array('value'=>Yii::app()->user->getId())); ?>
        <?php echo $form->labelEx($model, 'filename'); ?>
        <?php echo $form->fileField($model, 'filename', array('size'=>60, 'maxlength'=>200)); ?>
        <?php echo $form->error($model, 'filename'); ?>
        <?php echo $form->hiddenField($model, 'newName'); ?>
        <?php echo $form->error($model, 'newName'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details'); ?>
        <?php echo $form->error($model, 'details'); ?>
    </div>

    <?php if (!$model->isNewRecord) : ?>
    <div class="row buttons">
        <?php echo CHtml::Button('Upload File', array('class'=>'upload')); ?>
    </div>
    <?php endif; ?>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Upload' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->