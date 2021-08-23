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
        'admin' => [
            'users' => 'c,r,u,d',
            'professor' => 'c,r,u,d',
            'aulas' => 'c,r,u,d',
            'notifications' => 'c,r,u,d'
        ],
        'professor' => [
            'users' => 'c,r,u,d',
            'professor' => 'r',
            'aulas' => 'c,r,u,d',
            'notifications' => 'c,r,u,d'
        ],
        'aluno' => [
            'profile' => 'r,u',
            'aulas' => 'r',
            'notifications' => 'r,d'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
