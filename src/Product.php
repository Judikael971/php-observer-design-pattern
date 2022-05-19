<?php
namespace Judikael\PhpObserverDesignPattern;

use Judikael\PhpObserverDesignPattern\Events\Managers\Manager;
use Judikael\PhpObserverDesignPattern\Events\Listeners\LogListener;

class Product{
	public $eventManager;

	public function __construct()
	{
		$this->eventManager = new Manager();
		$this->eventManager->subscribe('add', new LogListener());
	}

	public function add($product_name)
	{
		return $this->eventManager->notify('add', $product_name);
	}
}
