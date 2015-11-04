<?php

return array(
    'title' => 'Загрузить XML-файл',

    'attributes' => array(
        'enctype' => 'multipart/form-data',
    ),

    'elements' => array(
        'image' => array(
            'type' => 'file',
            'label' => '',
        ),
    ),

    'buttons' => array(
        'reset' => array(
            'type' => 'reset',
            'label' => 'Сброс',
        ),
        'submit' => array(
            'type' => 'submit',
            'label' => 'Загрузить',
        ),
    ),
);