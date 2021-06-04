<?php

namespace GiocoPlus\LaravelWorkerman;

use Workerman\Worker;
use PHPSocketIO\SocketIO;
use Config;

class LaravelWorkermanServer extends SocketIO
{

	/**
	 * Start SocketIO server.
	 */
	public static function start() {
		$port = Config::get('laravel-workerman.server.port');
		$events = Config::get('laravel-workerman.events');
        $opts = Config::get('laravel-workerman.opts');

		$server = new Self($port, $opts);

		foreach ($events as $event) {
			new $event($server);
		}

		Worker::runAll();
	}

	/**
	 * Stop SocketIO server.
	 */
	public static function stop() {
		Worker::stopAll();
	}

	/**
	 * Get SocketIO server status.
	 */
	public static function getStatus() {
		return Worker::getStatus();
	}
}
