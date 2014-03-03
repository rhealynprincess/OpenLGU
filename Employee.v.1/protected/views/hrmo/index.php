<?php
/**
 * Human Resource Management Officer index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage HRMO
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HrmoController */

$this->pageTitle = Yii::app()->name . ' - HRMO';
$this->breadcrumbs = array(
    'Human Resource Management Officer'
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Human Resource Management Officer</h1>

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