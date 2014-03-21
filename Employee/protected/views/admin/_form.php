<?php
/**
 * Personnel Selection Board form.
 *
 * @package EmployeeInformationSystem
 * @subpackage PersonnelSelectionBoard
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this AdminController */
/* @var $model PersonnelSelectionBoard */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php 
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'psb-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

    <?php
        foreach (Yii::app()->user->getFlashes() as $key => $message) {
            echo "<div class='flash-$key'>$message</div>";
        }
    ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'chair_id'); ?>
        <?php 
            echo $form->dropDownList($model, 'chair_id',
                $model->getEmployees($model->chair_id, 3),
                array('empty'=>'NONE')
            );
        ?>
        <?php echo $form->error($model, 'chair_id'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'second_rep_id'); ?>
        <?php 
            echo $form->dropDownList($model, 'second_rep_id',
                $model->getEmployees($model->second_rep_id, 2),
                array('empty'=>'NONE')
            );
        ?>
        <?php echo $form->error($model, 'second_rep_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'first_rep_id'); ?>
        <?php 
            echo $form->dropDownList($model, 'first_rep_id',
                $model->getEmployees($model->first_rep_id, 1),
                array('empty'=>'NONE')
            );
        ?>
        <?php echo $form->error($model, 'first_rep_id'); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->