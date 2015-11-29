<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator;

class Money {

	/**
	 * @var int
	 */
	private $amount;

	/**
	 * @var Currency
	 */
	private $currency;

	public function __construct(int $amount, Currency $currency) {
		$this->amount = $amount;
		$this->currency = $currency;
	}

	public function addTo(Money $money) {
		$this->ensureCurrenciesMatch($this->currency, $money->currency());

		return new Money(
			$this->amount + $money->amount(),
			$this->currency
		);
	}

	public function amount() :int {
		return $this->amount;
	}

	public function currency() :Currency {
		return $this->currency;
	}

	public function equals(Money $money) :bool {
		return $this->currency->equals($money->currency()) &&
		$this->amount === $money->amount();
	}

	private function ensureCurrenciesMatch(Currency $myCurrency, Currency $yourCurrency) {
		if (!$myCurrency->equals($yourCurrency)) {
			throw new \InvalidArgumentException('Currency mismatch');
		}
	}
}
