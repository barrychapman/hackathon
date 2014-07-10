<?php
App::uses('AppModel', 'Model');
/**
 * Request Model
 *
 * @property Pass $Pass
 * @property Status $Status
 * @property Route $Route
 * @property Ride $Ride
 */
class Request extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'desc';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Route' => array(
			'className' => 'Route',
			'foreignKey' => 'route_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ride' => array(
			'className' => 'Ride',
			'foreignKey' => 'ride_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Meeting' => array(
            'className' => 'Meeting',
            'foreignKey' => 'meeting_id'
        )
	);
}
