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

	public function testTotalAndCoupon() { // Uus funktsioon, sarnane eelmisega;
		$input = [0,2,5,8];
		$coupon = 0.20; // Väärtus;
		$output = $this->Receipt->total($input, $coupon);
		$this->assertEquals( // Veendu, et võrdub;
			12, // Eeldatav tulemus;
			$output, // Väljund;
			'When summing the total should equal 12' // Veateade;
		);
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