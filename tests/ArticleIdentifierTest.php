<?php
namespace Noichl\ProductConfigurator;

/**
 * @covers \Noichl\ProductConfigurator\ArticleIdentifier
 */
class ArticleIdentifierTest extends \PHPUnit_Framework_TestCase {

	public function testIdentifierCanBeRetrieved() {
		$identifierString = "test";
		$articleIdentifier = new ArticleIdentifier($identifierString);
		$this->assertEquals($identifierString, $articleIdentifier->identifier());
	}

	/**
	 * @expectedException \InvalidArgumentException
	 * @expectedExceptionCode 1448835788862
	 */
	public function testIdentifierMustNotBeEmpty() {
		$articleIdentifier = new ArticleIdentifier('');
	}

	public function testCanCompareSameIdentifier() {
		$identifier1 = new ArticleIdentifier('test');
		$identifier2 = new ArticleIdentifier('test');

		$this->assertTrue($identifier1->equals($identifier2));
	}

	public function testCanCompareDifferentIdentifier() {
		$identifier1 = new ArticleIdentifier('test1');
		$identifier2 = new ArticleIdentifier('test2');

		$this->assertFalse($identifier1->equals($identifier2));
	}
}
