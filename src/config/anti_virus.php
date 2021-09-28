<?php

return [
    /**
     * You can select driver: clamd or pass
     */
    'driver' => 'clamd',

    /**
     * the method to connect clamd server is two: local and remote.
     * if you choose 'local', set 'local' to driver and set daemon path to local.path.
     * otherwise, set 'remote' to driver and set remote path to remote.path. 
     */
    'clamd' => [
        'driver' => 'local',

        'local' => [
            'path' => '/var/run/clamav/clamd.ctl'
        ],

        'remote' => [
            'url' => 'example.com'
        ]
    ]
];