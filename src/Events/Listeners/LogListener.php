<?php
namespace Judikael\PhpObserverDesignPattern\Events\Listeners;

use Judikael\PhpObserverDesignPattern\Utils\EventListenerInterface;

class LogListener implements EventListenerInterface {
	public function update($data)
	{
		echo $data;
		return true;
	}
}
