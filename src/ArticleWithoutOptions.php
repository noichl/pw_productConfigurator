<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator;

class ArticleWithoutOptions extends Article {

	public function totalPrice() :Money {
		return $this->basePrice();
	}
}
