<div class="inboard">
    <div>
        <?php
        $this->widget('HzlVisualizationChart', array('visualization' => 'LineChart',
                'data' => $data,
                'options' => array('title' => $title)));
        ?>
    </div>

    
    <div class="customize-graph">

        <?php
        //$model = new ChartDataForm();
        //$model->type = $type;

        $form = $this->beginWidget('CActiveForm', [
            'id'=> $type,
            'enableAjaxValidation'=>true,
            'clientOptions'=>[
                'validateOnSubmit'=>true
            ],
            //'focus'=>[$model,'id'],
        ]);
        //$form->errorSummary($model);

        echo $form->hiddenField($userview, 'id');
        ?>
        <div>
            <?php
            if ($list) {
                echo $form->dropDownList(
                    $userview,
                    'selection',
                    CHtml::listData($list,'id','name' ),
                    [
                        'class' => 'select-drop-down',
                        'options' => [
                            '0' => [ 'selected' => true ]
                        ]
                    ]);
            }
            ?>
        </div>
        <div>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker',
                [
                    'model'=>$userview,
                    'attribute'=>'startdate',
                    'options'=>[
                        'showAnim'=>'fold',
                        'autoSize'=>true,
                        'dateFormat'=>'yy-mm-dd',
                        //'defaultDate'=>$model->startDate,
                    ],
                    'htmlOptions'=>[
                        // 'value'=>date_format(new DateTime,'d/m/Y'),
                        'value'=>$userview->startdate,
                    ],
                ]);
            ?>
        </div>

        <div>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker',
                [
                    'model'=>$userview,
                    'attribute'=>'enddate',
                    'options'=>[
                        'showAnim'=>'fold',
                        'autoSize'=>true,
                        'dateFormat'=>'yy-mm-dd',
                        //'defaultDate'=>$model->endDate,
                    ],
                    'htmlOptions'=>[
                        //'value'=>date_format(new DateTime,'d/m/Y'),
                        'value'=>$userview->enddate,
                    ],
                ]);
            ?>
        </div>

        <?php echo CHtml::submitButton('Сохранить изменения');?>
    </div>
    <?php $this->endWidget('CActiveForm'); ?>
<div class="ask-content">
<h3>Помощь</h3>
    Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя в постели превратился в страшное насекомое.
</div>
    <ul class="check-list">
        <li><input type="checkbox" checked name="service" id="service1"><label for="service1">холодильники</label></li>
        <li><input type="checkbox" name="service" id="service2"><label for="service2">стиральные машины</label></li>
        <li><input type="checkbox" name="service" id="service3"><label for="service3">телевизоры</label></li>
        <li><input type="checkbox" name="service" id="service4"><label for="service4">электроплиты и газовых плиты</label></li>
        <li><input type="checkbox" name="service" id="service5"><label for="service5">посудомоечные машины</label></li>
        <li><input type="checkbox" name="service" id="service6"><label for="service6">сушильные машины</label></li>
        <li><input type="checkbox" name="service" id="service7"><label for="service7">кофемашины</label></li>
        <li><input type="checkbox" name="service" id="service8"><label for="service8">швейные машины</label></li>
        <li><input type="checkbox" name="service" id="service9"><label for="service9">СВЧ-печи</label></li>
        <li><input type="checkbox" name="service" id="service10"><label for="service10">чего-то другое</label></li>
    </ul>

<a href="javascript:void(0);" class="close"></a>
<a href="javascript:void(0);" class="extend">подробнее</a>
</div>

