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

	/**
	 * Money constructor.
	 *
	 * @param int $amount
	 * @param Currency $currency
	 */
	public function __construct(int $amount, Currency $currency) {
		$this->amount = $amount;
		$this->currency = $currency;
	}

	/**
	 * Adds the amounts of this object and the given one.
	 *
	 * @param \Noichl\ProductConfigurator\Money $money
	 *
	 * @throws \InvalidArgumentException If currencies differ
	 *
	 * @return \Noichl\ProductConfigurator\Money New Money Object with amount equals the sum.
	 */
	public function addTo(Money $money) {
		$this->ensureCurrenciesMatch($this->currency, $money->currency());

		return new Money(
			$this->amount + $money->amount(),
			$this->currency
		);
	}

	/**
	 * @return int
	 */
	public function amount() :int {
		return $this->amount;
	}

	/**
	 * @return Currency
	 */
	public function currency() :Currency {
		return $this->currency;
	}

	/**
	 * Depth Comparison of two value objects.
	 *
	 * @param \Noichl\ProductConfigurator\Money $money
	 *
	 * @return bool
	 */
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
