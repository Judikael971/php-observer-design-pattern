<?php
namespace Judikael\PhpObserverDesignPattern\Events\Listeners\tests;

use PHPUnit\Framework\TestCase;
use Judikael\PhpObserverDesignPattern\Events\Listeners\LogListener;

class LogListenerTest extends TestCase
{
	public function testLogListenerInterface()
	{
		$logListener = new LogListener();
		$this->assertTrue($logListener->update('Un Message de test'));
	}
}
