<?php
class Meeting extends AppModel {

    public $belongsTo = array(
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id'
        )
    );

    public $hasMany = array(
        'MeetingUser' => array(
            'className' => 'MeetingUser',
            'foreignKey' => 'meeting_id'
        )
    );





}