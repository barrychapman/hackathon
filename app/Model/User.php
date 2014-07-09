<?php

class User extends AppModel {

    public $hasMany = array(
        'MeetingUser' => array(
            'className' => 'MeetingUser',
            'foreignKey' => 'user_id'
        )
    );


}