<?php
App::uses('Ride', 'Model');

/**
 * Ride Test Case
 *
 */
class RideTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ride',
		'app.car',
		'app.route',
		'app.driver',
		'app.request',
		'app.pass',
		'app.status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ride = ClassRegistry::init('Ride');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ride);

		parent::tearDown();
	}

}
