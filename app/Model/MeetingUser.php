<?php
class MeetingUser extends AppModel {

    public $belongsTo = array(
        'Meeting' => array(
            'className' => 'Meeting',
            'foreignKey' => 'meeting_id'
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );



}