<?php
/**
 * Performance Evaluation form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Evaluation
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this EvaluationController */
/* @var $model PerformanceEvaluation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php 
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'evaluation-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('" . ((!$model->isNewRecord) || Yii::app()->user->checkAccess('ADMIN')) . "') {
        $('.ui-dialog .request').find('input[type=text], select').attr('disabled', 'disabled');
        if ('" . Yii::app()->user->checkAccess('HRMO') . "') {
            $('[id$=details]').attr('disabled', 'disabled');
        }
    }
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
    if ($('.flash-error').size()) {
        $('input[type=submit]').attr('disabled', 'disabled');
    }
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
        foreach (Yii::app()->user->getFlashes() as $key => $message) {
            echo "<div class='flash-$key'>$message</div>";
        }
    ?>
        
    <div class="request">
    <div class="row">
    <?php if (!$model->isNewRecord) : ?>
        <?php echo $form->labelEx($model, 'fullName'); ?>
        <?php echo $form->textField($model, 'fullName', array('readonly'=>'readonly')); ?>
    <?php else : ?>
        <?php echo $form->hiddenField($model, 'employee_id', array('value'=>Yii::app()->user->getId())); ?>
    <?php endif; ?>
    </div>
        
    <div class="row">
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php
            $date = ($model->date) ? date('m/d/Y', strtotime($model->date)) : date('m/d/Y');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array( 
                'name'=>CHtml::activeName($model, 'date'),
                'value'=>$date,
                'options'=>array(
                    'changeYear'=>true,
                    'yearRange'=>'-0:+0',
                )
            ));
        ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'attachment'); ?>
        <?php echo $form->dropDownList($model, 'attachment', $model->getAttachments(), array('empty'=>'NONE')); ?>
        <?php echo $form->error($model, 'attachment'); ?>
    </div> 
    </div>
    
    <?php if (!$model->isNewRecord) : ?>
    <div class="separator"></div>
        
    <div class="row">
        <?php echo $form->labelEx($model, 'headName'); ?>
        <?php echo $form->textField($model, 'headName', array('readonly'=>'readonly')); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details'); ?>
    </div>
    <?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->