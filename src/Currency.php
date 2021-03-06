<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator;

/**
 * Class Currency
 * Representing value-object class for currencies.
 *
 * @package Noichl\ProductConfigurator
 */
class Currency {

	/**
	 * @var string
	 */
	private $currency;

	/**
	 * Short forms of all supported currencies.
	 * @var string[]
	 */
	private $supportedCurrencies = ['EUR'];

	/**
	 * @param string $currency
	 */
	public function __construct(string $currency) {
		$this->ensureCurrencyIsSupported($currency);

		$this->currency = $currency;
	}

	/**
	 * @return string
	 */
	public function currency() :string {
		return $this->currency;
	}

	/**
	 * @param Currency $currency
	 *
	 * @return bool
	 */
	public function equals(Currency $currency) :bool {
		return $this->currency === $currency->currency();
	}

	/**
	 * @param $currency
	 */
	private function ensureCurrencyIsSupported($currency) {
		if (!in_array($currency, $this->supportedCurrencies)) {
			throw new \InvalidArgumentException('Unsupported currency');
		}
	}
}
