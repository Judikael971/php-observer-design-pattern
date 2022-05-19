<?php
namespace Judikael\PhpObserverDesignPattern\Utils;

interface EventManagerInterface{
	public function subscribe($eventType, $listener);
	public function unsubscribe($eventType, $listener);
	public function notify($listener, $data);
}
