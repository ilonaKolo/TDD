<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use PHPUnit\Framework\TestCase; //Raamistiku määramine;
use TDD\Receipt; //Algusfail;

class ReceiptTest extends TestCase {
	public function testTotal() {
		$Receipt = new Receipt(); // Klass -> Objekt;
		$this->assertEquals( // Viitab TestCase-le;
			15, // Väärtus;
			$Receipt->total([0,2,5,8]), // Receipt klassi objekti massiiv;
			'When summing the total should equal 15' // Kuvatakse vale väärtuse puhul;
		);
	}
}