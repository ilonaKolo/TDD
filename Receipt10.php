<?php
namespace TDD;

use \BadMethodCallException; // Kui tasikutsumine viitab määratlemata meetodile või kui puuduvad mõned argumendid;

class Receipt {
	public function total(array $items = [], $coupon) { 
		if ($coupon > 1.00) { // Kontrollib, et coupon ei oleks ühest suurem ja kui on, kuvatakse veateada;
			throw new BadMethodCallException('Coupon must be less than or equal to 1.00'); // Veateade;
		}
		$sum = array_sum($items); // Summa arvutamine;
		if (!is_null($coupon)) { // kui "couponil" on väärtus olemas;
			return $sum - ($sum * $coupon); // Arvutusse lisatakse "coupon";
		}
		return $sum;
	}

	public function tax($amount, $tax) {
		return ($amount * $tax);
	}

	public function postTaxTotal($items, $tax, $coupon) {
		$subtotal = $this->total($items, $coupon);
		return $subtotal + $this->tax($subtotal, $tax);
	}
}