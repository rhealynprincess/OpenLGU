<?php
/**
 * Manage Performance Evaluations index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Evaluation
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this EvaluationController */
/* @var $model Performance Evaluation */

$this->pageTitle = Yii::app()->name . ' - Manage Evaluations';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Performance Evaluation',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('evaluation-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Evaluations</h1>

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
    'id'=>'evaluation-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'evaluation_id',
        'fullName',
        array(
            'name'=>'date',
            'value'=>'($data->date) ? date("m/d/Y", strtotime($data->date)) : null',
        ),
        'headName',
        'details',
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
                    'url'=>'Yii::app()->createUrl("evaluation/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#evaluation-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "Update Resignation");
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
    'id'=>'evaluation-dialog',
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