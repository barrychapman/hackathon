<?php
class Route extends AppModel {


    public $belongsTo = array(
        'Destination' => array(
            'className' => 'Location',
            'foreignKey' => 'dest_id'
        ),
        'Origin' => array(
            'className' => 'Location',
            'foreignKey' => 'origin_id'
        )
    );



}