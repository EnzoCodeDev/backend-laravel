<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'documents_colaborators' => [
            'driver' => 'local',
            'root' => storage_path('app/public/documents_colaborators'),
            'url' => env('APP_URL') . '/storage/documents_colaborators',
            'visibility' => 'public',
            'throw' => false,
        ],
        'image_profile_colaborators' => [
            'driver' => 'local',
            'root' => storage_path('app/public/image_profile_colaborators'),
            'url' => env('APP_URL') . '/storage/image_profile_colaborators',
            'visibility' => 'public',
            'throw' => false,
        ],

        'excuses_logs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/excuses_logs'),
            'url' => env('APP_URL') . '/storage/excuses_logs',
            'visibility' => 'public',
            'throw' => false,
        ],

        'settings_roster_log' => [
            'driver' => 'local',
            'root' => storage_path('app/public/settings_roster_log'),
            'url' => env('APP_URL') . '/storage/settings_roster_log',
            'visibility' => 'public',
            'throw' => false,
        ],

        'overtime_hours_logs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/overtime_hours_logs'),
            'url' => env('APP_URL') . '/storage/overtime_hours_logs',
            'visibility' => 'public',
            'throw' => false,
        ],

        'vacations_logs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/vacations_logs'),
            'url' => env('APP_URL') . '/storage/vacations_logs',
            'visibility' => 'public',
            'throw' => false,
        ],

        'postulations_img' => [
            'driver' => 'local',
            'root' => storage_path('app/public/postulations_img'),
            'url' => env('APP_URL') . '/storage/postulations_img',
            'visibility' => 'public',
            'throw' => false,
        ],

        'incidence_types_icons' => [
            'driver' => 'local',
            'root' => storage_path('app/public/incidence_types_icons'),
            'url' => env('APP_URL') . '/storage/incidence_types_icons',
            'visibility' => 'public',
            'throw' => false,
        ],

        'priority_types_icons' => [
            'driver' => 'local',
            'root' => storage_path('app/public/priority_types_icons'),
            'url' => env('APP_URL') . '/storage/priority_types_icons',
            'visibility' => 'public',
            'throw' => false,
        ],

        'projects_incidence_types_icons' => [
            'driver' => 'local',
            'root' => storage_path('app/public/projects_incidence_types_icons'),
            'url' => env('APP_URL') . '/storage/projects_incidence_types_icons',
            'visibility' => 'public',
            'throw' => false,
        ],

        'projects_priority_types_icons' => [
            'driver' => 'local',
            'root' => storage_path('app/public/projects_priority_types_icons'),
            'url' => env('APP_URL') . '/storage/projects_priority_types_icons',
            'visibility' => 'public',
            'throw' => false,
        ],

        'preliquidations' => [
            'driver' => 'local',
            'root' => storage_path('app/public/preliquidations'),
            'url' => env('APP_URL') . '/storage/preliquidations',
            'visibility' => 'public',
            'throw' => false,
        ],

        'prizes_archives' => [
            'driver' => 'local',
            'root' => storage_path('app/public/prizes_archives'),
            'url' => env('APP_URL') . '/storage/prizes_archives',
            'visibility' => 'public',
            'throw' => false,
        ],

        'project_gestion' => [
            'driver' => 'local',
            'root' => storage_path('app/public/project_gestion'),
            'url' => env('APP_URL') . '/storage/project_gestion',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
