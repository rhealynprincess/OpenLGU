<?php
/**
 * Resignation form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Resign
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this ResignController */
/* @var $model Resign */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php 
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'resign-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

/*Yii::app()->clientScript->scriptMap=array(
    'jquery.js'=>false,       
);*/

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('" . (!$model->isNewRecord) . "') {
        $('.ui-dialog .request').find('input[type=text], select, textarea').attr('disabled', 'disabled');
        if ('" . Yii::app()->user->checkAccess('DEPARTMENT HEAD') . "') {
            $('[id*=hrmo]').attr('disabled', 'disabled').parent().css('display', 'none');
        }
        else if ('" . Yii::app()->user->checkAccess('HRMO') . "') {
            $('[id*=head]').attr('disabled', 'disabled');
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
    
    <?php if ($model->approve_date) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'approve_date'); ?>
        <?php
            echo $form->textField($model, 'approve_date', array(
                'readonly'=>'readonly',
                'value'=>date('m/d/Y', strtotime($model->approve_date))
            ));
        ?>
    </div>
    <?php endif; ?>
    
    <div class="request">
    <?php if (!$model->isNewRecord) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'fullName'); ?>
        <?php echo $form->textField($model, 'fullName', array('readonly'=>'readonly')); ?>
    </div>
    
    <?php else : ?>
    <div class="row">
        <?php echo $form->hiddenField($model, 'employee_id', array('value'=>Yii::app()->user->getId())); ?>
        <?php echo $form->hiddenField($model, 'head_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'hrmo_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'request_date', array('value'=>date('m/d/Y'))); ?>
    </div>
    <?php endif; ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details'); ?>
        <?php echo $form->error($model, 'details'); ?>
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
        <?php echo $form->labelEx($model, 'request_date'); ?>
        <?php
            echo $form->textField($model, 'request_date', array(
                'readonly'=>'readonly',
                'value'=>date('m/d/Y', strtotime($model->request_date))
            ));
        ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'headName'); ?>
        <?php echo $form->textField($model, 'headName', array('readonly'=>'readonly')); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'head_status'); ?>
        <?php echo $form->dropDownList($model, 'head_status', Employee::model()->status); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'hrmoName'); ?>
        <?php echo $form->textField($model, 'hrmoName', array('readonly'=>'readonly')); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'hrmo_status'); ?>
        <?php echo $form->dropDownList($model, 'hrmo_status', Employee::model()->status); ?>
    </div>
    <?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->