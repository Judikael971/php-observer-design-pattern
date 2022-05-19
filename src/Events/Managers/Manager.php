<?php

namespace Judikael\PhpObserverDesignPattern\Events\Managers;

use Judikael\PhpObserverDesignPattern\Utils\EventManagerInterface;

class Manager implements EventManagerInterface
{
	static $listeners = array();

	public function subscribe($eventType, $listener)
	{
		self::$listeners[$eventType][get_class($listener)] = $listener;
		return true;
	}

	public function unsubscribe($eventType, $listener)
	{
		$listener_name = $listener;
		if(is_object($listener))
		{
			$listener_name = get_class($listener);
		}
		if(isset(self::$listeners[$eventType][$listener_name])){
			unset(self::$listeners[$eventType][$listener_name]);
			return true;
		}
		return false;
	}

	public function notify($eventType, $data)
	{
		foreach (self::$listeners[$eventType] as $listener_name => $listener){
			if(!$listener->update($data)){
				//-- TODO: notifier ou logger qu'une erreur s'est produite
			}
		}
		return true;
	}
}
