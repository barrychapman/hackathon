<?php

class Area extends AppModel {


    public $hasMany = array(
        'Location' => array(
            'foreignKey' => 'location_id',\
            'className' => 'Location'
        )
    );




}