<?php
/**
 * Administrator index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Admin
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this AdminController */

$this->pageTitle = Yii::app()->name . ' - Admin';
$this->breadcrumbs = array(
    'Admin'
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Admin</h1>

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