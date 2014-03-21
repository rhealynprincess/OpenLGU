<?php
/**
 * View Calendar which lists all Calendar Entries for the current month.
 *
 * @package EmployeeInformationSystem
 * @subpackage Calendar
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this CalendarController */
/* @var $model Calendar */

$this->pageTitle = Yii::app()->name . ' - Calendar';
$this->breadcrumbs = array('Calendar');

$day = isset($_GET['day']) ? $_GET['day'] : 0;
Yii::app()->clientScript->registerScript(uniqid(), "
    $('#calendarList > table tr > td').each(function(){
        $('#calendar tbody a').eq($(this).html()-1).addClass('highlight');
        if ($day && $day != $(this).find('td').html()) $(this).remove();
    });
");
?>

<div id="calendarContainer">
<h1>Calendar</h1>

<?php
if (in_array(Yii::app()->user->getState('role'), array('ADMIN', 'DEPARTMENT HEAD'))) {
    echo CHtml::ajaxButton('Add Entry', Yii::app()->createUrl('/calendar/create'),
        array('success'=>'function(data){
            $("#calendar-dialog").dialog("option", "title", "Add Entry");
            $("#calendar-dialog").html(data).dialog("open");
        }'),
        array('id'=>'entry')
    );
}

$this->widget('ext.simple-calendar.SimpleCalendarWidget');
?>
</div>

<div id="calendarList">
<h3>Schedule</h3>
<p>You can click on individual days to filter the Calendar.</p>
<table>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->getCalendarEntries(),
    'itemView'=>'_list'
));
?>

</table></div>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'calendar-dialog',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
        'draggable'=>false,
        'resizable'=>false,
        'width'=>550,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();
?>