<?php
namespace TDD;
class Receipt {
	public function total(array $items = []) {
		return array_sum($items); // Items summa;
	}

	public function tax($amount, $tax) { // Tax meetod;
		return ($amount * $tax); // Tax tehe;
	}
}