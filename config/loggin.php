<?php
return [
    'channels' => [
        // ...
        'vehicle' => [
            'driver' => 'daily',
            'path' => storage_path('logs/vehicle/off_shelf.log'),
            'level' => 'info',
            'days' => 7
        ],
    ]

];