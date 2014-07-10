<?php
App::uses('AppModel', 'Model');
/**
 * Ride Model
 *
 * @property Car $Car
 * @property Route $Route
 * @property Driver $Driver
 * @property Request $Request
 */
class Ride extends AppModel {

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
		'Car' => array(
			'className' => 'Car',
			'foreignKey' => 'car_id',
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
		'Driver' => array(
			'className' => 'Driver',
			'foreignKey' => 'driver_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Request' => array(
			'className' => 'Request',
			'foreignKey' => 'ride_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
