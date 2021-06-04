<?php

return [

    /**
     * Listen port for SocketIO client.
     */
    'server' => [
		'port' => 3000,
	],

	/**
	 * Events dispatched when SocketIO server is running.
	 */
	'events' => [
		App\Events\SendWSMessage::class,
	],

    'opts' => [
        'ssl' => [
            'local_cert'  => env('WS_SSL_CERT', '/etc/nginx/conf.d/ssl/server.pem'), // 也可以是crt文件
            'local_pk'    => env('WS_SSL_PK', '/etc/nginx/conf.d/ssl/server.key'),
            'verify_peer' => boolval(env('WS_VERIFY_PEER', false)),
        ],
    ]
];
