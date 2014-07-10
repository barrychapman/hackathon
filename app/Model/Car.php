<?php
App::uses('AppModel', 'Model');
/**
 * Car Model
 *
 * @property Ride $Ride
 */
class Car extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'model';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */

    public $belongsTo = array(
        'Driver' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );


	public $hasMany = array(
		'Ride' => array(
			'className' => 'Ride',
			'foreignKey' => 'car_id',
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
