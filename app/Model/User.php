<?php

class User extends AppModel {

    public $hasMany = array(
        'MeetingUser' => array(
            'className' => 'MeetingUser',
            'foreignKey' => 'user_id'
        ),
        'Request' => array(
            'className' => 'Request',
            'foreignKey' => 'user_id'
        )
    );

    public $belongsTo = array(
        'Office' => array(
            'className' => 'Location',
            'foreignKey' => 'office_id'
        )
    );

    public $hasOne = array(
        'Car' => array(
            'className' => 'Car',
            'foreignKey' => 'user_id'
        )
    );
}