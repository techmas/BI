<div class="inbord">
    <a href="#" class="close"></a>


    <div>
        <?php
        $this->widget('HzlVisualizationChart', array('visualization' => 'LineChart',
                'data' => $data,
                'options' => array('title' => $title)));
        ?>
    </div>
    <div>
        <?php
        //$model = new ChartDataForm();
        $model->type = $type;

        $form = $this->beginWidget('CActiveForm', [
            'id'=> $type,
            'enableAjaxValidation'=>true,
            'clientOptions'=>[
                'validateOnSubmit'=>true
            ],
            //'focus'=>[$model,'id'],
        ]);
        //$form->errorSummary($model);

        echo $form->hiddenField($model, 'type');
        ?>
        <div>
            <?php
            if ($list) {
                echo $form->dropDownList(
                    $model,
                    'data',
                    CHtml::listData($list,'id','name' ),
                    [
                        'class' => 'my-drop-down',
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
                    'model'=>$model,
                    'attribute'=>'startDate',
                    'options'=>[
                        'showAnim'=>'fold',
                        'autoSize'=>true,
                        'dateFormat'=>'dd/mm/yy',
                        //'defaultDate'=>$model->startDate,
                    ],
                    'htmlOptions'=>[
                        // 'value'=>date_format(new DateTime,'d/m/Y'),
                        'value'=>$model->startDate,
                    ],
                ]);
            ?>
        </div>

        <div>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker',
                [
                    'model'=>$model,
                    'attribute'=>'endDate',
                    'options'=>[
                        'showAnim'=>'fold',
                        'autoSize'=>true,
                        'dateFormat'=>'dd/mm/yy',
                        'defaultDate'=>$model->endDate,
                    ],
                    'htmlOptions'=>[
                        //'value'=>date_format(new DateTime,'d/m/Y'),
                        'value'=>$model->endDate,
                    ],
                ]);
            ?>
        </div>

        <?php echo CHtml::submitButton('Save Changes');?>
    </div>
    <?php $this->endWidget('CActiveForm'); ?>
</div>

