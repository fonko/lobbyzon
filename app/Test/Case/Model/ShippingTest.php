<?php
App::uses('Shipping', 'Model');

/**
 * Shipping Test Case
 *
 */
class ShippingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shipping',
		'app.article',
		'app.item',
		'app.transaction',
		'app.payment',
		'app.image',
		'app.question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Shipping = ClassRegistry::init('Shipping');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shipping);

		parent::tearDown();
	}

}
