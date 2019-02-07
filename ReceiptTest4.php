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
		$output = $this->Receipt->total($input);
		$this->assertEquals(
			15,
			$output,
			'When summing the total should equal 15'
		);
	}

	public function testTax() { // Uus funktsioon;
		$inputAmount = 10.00; // Kogu sisend;
		$taxInput = 0.10; // Tax-sisend;
		$output = $this->Receipt->tax($inputAmount, $taxInput); // Luuaks tax-väljund;
		$this->assertEquals( // Veendu, et võrdub;
			1.00, // Eeldatav tulemus;
			$output, // Väljund;
			'The tax calculation should equal 1.00' // Veateada;
		);
	}
}