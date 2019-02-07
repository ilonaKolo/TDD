<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase {
	public function setUp() {
		$this->Receipt = new Receipt();
	}

	public function tearDown() {
		unset($this->Receipt);
	}
	public function testTotal() {
		$input = [0,2,5,8];
		$coupon = null;
		$output = $this->Receipt->total($input, $coupon);
		$this->assertEquals(
			15,
			$output,
			'When summing the total should equal 15'
		);
	}

	public function testTotalAndCoupon() {
		$input = [0,2,5,8];
		$coupon = 0.20;
		$output = $this->Receipt->total($input, $coupon);
		$this->assertEquals(
			12,
			$output,
			'When summing the total should equal 12'
		);
	}
	public function testPostTaxTotal() { // Maksu korrektse lisamisse kontroll-funktsioon;
		$Receipt = $this->getMockBuilder('TDD\Receipt') // Receipt class alusel luuakse Mock-objekt;
			->setMethods(['tax', 'total']) // Meetodite lisamine Mockile;
			->getMock(); 
		$Receipt->method('total') // Mock objekti "total";
			->will($this->returnValue(10.00)); // Antud väljund;
		$Receipt->method('tax') // Mock meetod "tax";
			->will($this->returnValue(1.00)); // Tax väljund;
		$result = $Receipt->postTaxTotal([1,2,5,8], 0.20, null); // Mock meetod;
		$this->assertEquals(11.00, $result); // Eeldatav väljund;
	}

	public function testTax() {
		$inputAmount = 10.00;
		$taxInput = 0.10;
		$output = $this->Receipt->tax($inputAmount, $taxInput);
		$this->assertEquals(
			1.00,
			$output,
			'The tax calculation should equal 1.00'
		);
	}
}