<?php
App::uses('AppModel', 'Model');
/**
 * Location Model
 *
 */
class Location extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $hasMany = array(
        'Meeting' => array(
            'className' => 'Meeting',
            'foreignKey' => 'location_id'
        )
    );

    public $belongsTo = array(
        'Area' => array(
            'className' => 'Area',
            'foreignKey' => 'area_id'
        )
    );


}
