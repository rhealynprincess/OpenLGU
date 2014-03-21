<?php
/**
 * Transfer form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Transfer
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this TransferController */
/* @var $model Transfer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php 
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'transfer-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('" . ($view == 'emp') . "' && '" . (!$model->isNewRecord) . "') {
        $('.ui-dialog .request').find('input[type=text], select, textarea').attr('disabled', 'disabled');
        $('[id*=admin]').attr('disabled', 'disabled').parent().css('display', 'none');
    }
    if ('" . ($view == 'admin') . "') {
        $('.ui-dialog .request').find('input[type=text], select, textarea').attr('disabled', 'disabled');
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
    
    <?php if ($model->approve_date && ($view != 'emp')) : ?>
    <div class="row">
        <label>&nbsp </label>
        <?php
            echo CHTML::button('Update Position', array(
                'submit'=>array('/position'),
                'params'=>array('id'=>$model->employee->position->position_id),
                'name'=>'update'
            ));
        ?>
    </div>
    
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
        <?php echo $form->labelEx($model, 'headName'); ?>
        <?php echo $form->textField($model, 'headName', array('readonly'=>'readonly')); ?>
    </div>
    
    <?php else : ?>
        <?php echo $form->hiddenField($model, 'head_id', array('value'=>Yii::app()->user->getId())); ?>
        <?php echo $form->hiddenField($model, 'emp_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'admin_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'request_date', array('value'=>date('m/d/Y'))); ?>
    <?php endif; ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'employee_id'); ?>
        <?php echo $form->dropDownList($model, 'employee_id', $model->getAllEmployees()); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details'); ?>
        <?php echo $form->error($model, 'details'); ?>
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
        <?php echo $form->labelEx($model, 'emp_status'); ?>
        <?php echo $form->dropDownList($model, 'emp_status', Employee::model()->approve); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'adminName'); ?>
        <?php echo $form->textField($model, 'adminName', array('readonly'=>'readonly')); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'admin_status'); ?>
        <?php echo $form->dropDownList($model, 'admin_status', Employee::model()->approve); ?>
    </div>
    <?php endif; ?>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->