<?php
/**
 * Manage Leaves index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Leave
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this LeaveController */
/* @var $model Leave */

$this->pageTitle = Yii::app()->name . ' - Manage Leaves';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Leave',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('leave-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Leaves</h1>

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

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'leave-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'leave_id',
        'fullName',
        'leaveName',
        array(
            'name'=>'date_from',
            'value'=>'($data->date_from) ? date("m/d/Y", strtotime($data->date_from)) : null',
        ),
        array(
            'name'=>'date_to',
            'value'=>'($data->date_to) ? date("m/d/Y", strtotime($data->date_to)) : null',
        ),
        'head_status',
        array(
            'name'=>'attachment',
            'type'=>'raw',
            'htmlOptions'=>array('class'=>'button-column'),
            'value'=>'($data->attachment) ? CHtml::imageButton(
                                                Yii::app()->request->baseUrl . "/images/download.png",
                                                array(
                                                    "submit"=>array("document/download", "id"=>$data->attachment),
                                                    "confirm"=>"Are you sure you want to download this file?",
                                                )
                                            )
                                          : null',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'url'=>'Yii::app()->createUrl("leave/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#leave-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "Update Leave");
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
    'id'=>'leave-dialog',
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