<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Installer Settings
    |--------------------------------------------------------------------------
    |
    | The installer configuration. Useful when running the installation
    | wizard on an existing project and you want to disable key generation.
    |
    */
    'settings' => [
        'generate_key' => true,
        'publish_files' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | The default Laravel server requirements, you can add as many
    | as your application require, we check if the extension is enabled
    | by looping through the array and run "extension_loaded" on it.
    |
    */
    'core' => [
        'min_php_version' => '7.0.0',
    ],
    'requirements' => [
        'php' => [
            'openssl',
            'pdo',
            'mbstring',
            'tokenizer',
            'JSON',
            'cURL',
        ],
        'apache' => [
            'mod_rewrite',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | The default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/framework' => '755',
        'storage/logs' => '755',
        'bootstrap/cache' => '755',
    ],

    /*
    |--------------------------------------------------------------------------
    | Environment Form Wizard Validation Rules & Messages
    |--------------------------------------------------------------------------
    |
    | The default form field validation rules.
    |
    */
    'environment' => [
        'app' => [
            'APP_NAME' => [
                'default' => 'Draft',
                'helper-text' => 'Your applications name.',
            ],
            'APP_ENV' => [
                'default' => 'local',
                'options' => [
                    'local',
                    'production',
                ],
                'helper-text' => 'The environment your application is running in.',
            ],
            'APP_DEBUG' => [
                'default' => 'true',
                'options' => [
                    'true',
                    'false',
                ],
                'helper-text' => 'Debug level for your application.',
            ],
            'APP_LOG_LEVEL' => [
                'default' => 'debug',
                'options' => [
                    'debug',
                    'info',
                    'notice',
                    'warning',
                    'error',
                    'critical',
                    'alert',
                    'emergency',
                ],
                'helper-text' => 'Log level for your application.',
            ],
            'APP_URL' => [
                'default' => 'http://localhost',
                'helper-text' => 'Your applications URL.',
            ],
        ],
        'db' => [
            'DB_CONNECTION' => [
                'default' => 'mysql',
                'options' => [
                    'mysql',
                    'sqlite',
                    'pgsql',
                    'sqlsrv',
                ],
                'helper-text' => 'The database driver you\'re using.',
            ],
            'DB_HOST' => [
                'default' => '127.0.0.1',
                'helper-text' => 'Usually localhost.',
            ],
            'DB_PORT' => [
                'default' => 3306,
                'helper-text' => 'The port your database is running on.',
            ],
            'DB_DATABASE' => [
                'default' => 'homestead',
                'helper-text' => 'Database name.',
            ],
            'DB_USERNAME' => [
                'default' => 'homestead',
                'helper-text' => 'Database username.',
            ],
            'DB_PASSWORD' => [
                'default' => 'secret',
                'helper-text' => 'Database password',
            ],
        ],
        'broadcast' => [
            'BROADCAST_DRIVER' => [
                'default' => 'log',
                'options' => [
                    'log',
                    'pusher',
                    'redis',
                    'null',
                ],
                'helper-text' => 'The type of driver used for broadcast.',
            ],
        ],
        'cache' => [
            'CACHE_DRIVER' => [
                'default' => 'file',
                'options' => [
                    'file',
                    'apc',
                    'array',
                    'database',
                    'memcached',
                    'redis',
                ],
                'helper-text' => 'The type of driver used for cache.',
            ],
        ],
        'session' => [
            'SESSION_DRIVER' => [
                'default' => 'file',
                'options' => [
                    'file',
                    'cookie',
                    'database',
                    'apc',
                    'memcached',
                    'redis',
                    'array',
                ],
                'helper-text' => 'The type of driver used for sessions.',
            ],
            'SESSION_LIFETIME' => [
                'default' => 120,
                'helper-text' => 'How long the session lifetime should be in minutes.',
            ],
        ],
        'queue' => [
            'QUEUE_DRIVER' => [
                'default' => 'sync',
                'options' => [
                    'sync',
                    'database',
                    'beanstalkd',
                    'sqs',
                    'redis',
                    'null',
                ],
                'helper-text' => 'The type of driver used for queuing jobs.',
            ],
        ],
        'mail' => [
            'MAIL_DRIVER' => [
                'default' => 'smtp',
                'options' => [
                    'smtp',
                    'sendmail',
                    'mailgun',
                    'mandrill',
                    'ses',
                    'sparkpost',
                    'log',
                    'array',
                ],
                'helper-text' => 'The type of driver used for mailing.',
            ],
            'MAIL_HOST' => [
                'default' => 'smtp.mailtrap.io',
                'helper-text' => 'Your mail host.',
            ],
            'MAIL_PORT' => [
                'default' => 2525,
                'helper-text' => 'The port used for mail.',
            ],
            'MAIL_USERNAME' => [
                'default' => 'null',
                'helper-text' => 'Mail authentication username.',
            ],
            'MAIL_PASSWORD' => [
                'default' => 'null',
                'helper-text' => 'Mail authentication password.',
            ],
            'MAIL_ENCRYPTION' => [
                'default' => 'null',
                'helper-text' => 'The type of encryption to be used for mail.',
            ],
        ],
        'pusher' => [
            'PUSHER_APP_ID' => [
                'helper-text' => 'Your pusher application ID',
            ],
            'PUSHER_APP_KEY' => [
                'helper-text' => 'Your pusher application key.',
            ],
            'PUSHER_APP_SECRET' => [
                'helper-text' => 'Your pusher application secret.',
            ],
        ],
    ],
];
