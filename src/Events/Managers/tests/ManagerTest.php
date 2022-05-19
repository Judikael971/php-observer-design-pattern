<?php
namespace Judikael\PhpObserverDesignPattern\Events\Managers\tests;

use PHPUnit\Framework\TestCase;
use Judikael\PhpObserverDesignPattern\Events\Listeners\LogListener;
use Judikael\PhpObserverDesignPattern\Events\Managers\Manager AS Manager;
use Judikael\PhpObserverDesignPattern\Product;

class ManagerTest extends TestCase
{
	public function testManagerInterface()
	{
		$this->assertClassHasAttribute("listeners", Manager::class);
		$manager = new Manager();
		$log = new LogListener();
		$this->assertTrue($manager->subscribe('add', $log));
	}

	public function testManagerSubscribe()
	{
		$manager = new Manager();
		$log = new LogListener();
		$this->assertTrue($manager->subscribe('add', $log));
	}

	public function testManagerUnsubscribeFailed()
	{
		Manager::$listeners = array();
		$manager = new Manager();
		$log = new LogListener();
		$this->assertFalse($manager->unsubscribe('add', $log));
	}

	public function testManagerUnsubscribe()
	{
		Manager::$listeners = array();
		$manager = new Manager();
		$log = new LogListener();
		$this->assertTrue($manager->subscribe('add', $log));
		$this->assertTrue($manager->unsubscribe('add', $log));
	}

	public function testManagerNotify()
	{
		Manager::$listeners = array();
		$product = new Product();
		$this->assertTrue($product->add('Une poule'));
	}
}
