<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase {
	public function setUp() { // Funktsioonid, mis käivitatakse enne igat testimist;
		$this->Receipt = new Receipt(); // Klass -> Objekt;
	}

	public function tearDown() { // Funktsioonid, mis käivitatakse enne igat testimist;
		unset($this->Receipt); // Mälu tühjendamine;
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
}