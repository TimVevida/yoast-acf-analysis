<?php

namespace Yoast\AcfAnalysis\Tests;

use Brain\Monkey;
use PHPUnit\Framework\TestCase;

/**
 * Class Main_Test.
 */
class Main_Test extends TestCase {

	/**
	 * Sets up test fixtures.
	 *
	 * @return void
	 */
	protected function setUp() {
		parent::setUp();
		Monkey\setUp();
	}

	/**
	 * Tears down test fixtures previously setup.
	 *
	 * @return void
	 */
	protected function tearDown() {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Tests invalid configurations.
	 *
	 * @return void
	 */
	public function testInvalidConfig() {
		$registry = \Yoast_ACF_Analysis_Facade::get_registry();

		$registry->add( 'config', 'Invalid Config' );

		$testee = new \AC_Yoast_SEO_ACF_Content_Analysis();
		$testee->boot();

		$result = $registry->get( 'config' );

		$this->assertNotSame( 'Invalid Config', $result );
		$this->assertInstanceOf( \Yoast_ACF_Analysis_Configuration::class, $result );
	}
}
