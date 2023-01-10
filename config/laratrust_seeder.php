<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'schools' => 'c,r,u,d',
            'departements' => 'c,r,u,d',
            'memoires' => 'c,r,u,d'
        ],
        'responsable' => [
            'users' => 'c,r,u',
            'schools' => 'c,r,u,d',
            'departements' => 'c,r,u,d',
            'memoires' => 'c,r,u,d'
        ],
        'visitor' => [
            'schools' => 'r',
            'departements' => 'r',
            'memoires' => 'r'
        ],
        // 'role_name' => [
        //     'module_1_name' => 'c,r,u,d',
        // ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
