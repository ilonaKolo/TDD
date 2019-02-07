<?php
namespace TDD;
class Receipt {
	public function total(array $items = [], $coupon) { // Uus muutuja "coupon";
		$sum = array_sum($items); // Summa arvutamine;
		if (!is_null($coupon)) { // Juhul, kui muutujal on väärtus olemas;
			return $sum - ($sum * $coupon); // Arvutusele lisatakse coupon;
		}
		return $sum; // Tulemuse tagastamine;
	}

	public function tax($amount, $tax) {
		return ($amount * $tax);
	}
}