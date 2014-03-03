<?php
/**
 * Manage Calendars Entries index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Calendar
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this CalendarController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Manage Calendar';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Calendar',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('calendar-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Calendar</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
echo CHtml::button('Advanced Search', array('class'=>'search'));
echo '<div class="search-form" style="display:none">';
$this->renderPartial('_search', array(
    'model'=>$model,
));
echo '</div><!-- search-form -->';

echo CHtml::ajaxButton('Add Entry', Yii::app()->createUrl('/calendar/create'), array(
    'success'=>'function(data){
        $("#calendar-dialog").dialog("option", "title", "Add Entry");
        $("#calendar-dialog").html(data).dialog("open");
    }'
));

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'calendar-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'entry_id',
        'author',
        array(
            'name'=>'date',
            'value'=>'($data->date) ? date("m/d/Y", strtotime($data->date)) : null',
        ),
        'details',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'url'=>'Yii::app()->createUrl("calendar/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#calendar-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "Update Entry");
                            $(this).dialog("open");
                        });
                        return false;
                    }'
                ),
            ),
        ),
    ),
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'calendar-dialog',
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