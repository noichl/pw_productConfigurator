<?php
namespace Noichl\ProductConfigurator;
use Noichl\ProductConfigurator\Article\ArticleIdentifier;

/**
 * @covers \Noichl\ProductConfigurator\Article
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 * @uses   \Noichl\ProductConfigurator\Article\ArticleIdentifier
 */
class ArticleTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var string
	 */
	private $name = "Test Name";

	/**
	 * @var ArticleIdentifier
	 */
	private $identifier;

	/**
	 * @var Money
	 */
	private $price;

	/**
	 * @var Article | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $article;

	public function setUp() {
		$this->identifier = new ArticleIdentifier('TestId');
		$this->price = new Money(1, new Currency('EUR'));
		$this->article = $this->getMockForAbstractClass(Article::class, [$this->identifier, $this->name, $this->price]);
	}

	public function testNameCanBeRetrieved() {
		$this->assertEquals($this->name, $this->article->name());
	}

	public function testIdentifierCanBeRetrieved() {
		$this->assertEquals($this->identifier, $this->article->identifier());
	}
}
