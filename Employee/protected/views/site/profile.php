<?php
/**
 * Profile page for Employees.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
$this->pageTitle = Yii::app()->name . ' - Profile';
$this->breadcrumbs = array(
    'Profile',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Profile</h1>
<h2><?php echo "$model->last_name, $model->first_name $model->middle_name"; ?></h2>

<?php if ($model->employee->position) : ?>
<h6><?php echo "{$model->employee->position->title} / $model->role"; ?></h6>
<h6><?php echo "{$model->employee->position->departmentName}"; ?></h6>
<?php else : ?>
<h6><?php echo $model->role; ?></h6>
<?php endif; ?>

<div class="notice">
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo "<div class='flash-$key'>$message</div>";
}
?>
</div>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'order-dialog',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>550,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();
?>