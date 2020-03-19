<?php

return [
  [
    'gate' => 'administrator.account',
    'name' => 'Account',
    'route' => null,
    'isActive' => 'account/*',
    'icon' => 'fas fa-user-circle',
    'id' => '',
    'gates' => [],
    'submenus' => [
      
      [
        'gate' => 'administrator.account.admin.index',
        'name' => 'User Admin',
        /**
         * Declaration route Example
         * ['administrator.account.admin.show', ['uuid-uuid-uuid', 'foo' => 'bar']] --> https://domain.com/administrator/account/admin/uuid-uuid-uuid?foo=bar
         */
        'route' => ['administrator.account.admin.index', []],
        'isActive' => 'account/admin/*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.account.admin.create',
            'title' => 'Create admin',
            'description' => 'User can create new admin'
          ],
          [
            'gate' => 'administrator.account.admin.update',
            'title' => 'Update admin',
            'description' => 'User can update admin'
          ]
        ],
      ]

    ]
  ],
  [
    'gate' => 'administrator.access',
    'name' => 'Access',
    'route' => null,
    'isActive' => 'access/*',
    'icon' => 'fas fa-lock',
    'id' => '',
    'gates' => [],
    'submenus' => [

      [
        'gate' => 'administrator.access.role.index',
        'name' => 'Role',
        'route' => ['administrator.access.role.index', []],
        'isActive' => 'access/role/*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.access.role.create',
            'title' => 'Create Role',
            'description' => 'User can create new role'
          ],
          [
            'gate' => 'administrator.access.role.update',
            'title' => 'Update Role',
            'description' => 'User can update role'
          ]
        ],
      ],

      [
        'gate' => 'administrator.access.permission.index',
        'name' => 'Permission',
        'route' => ['administrator.access.permission.index', []],
        'isActive' => 'access/permission/*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.access.permission.show',
            'title' => 'Views detail Permission',
            'description' => 'User can view detail for all permission'
          ],
          [
            'gate' => 'administrator.access.permission.update',
            'title' => 'Assign Permission',
            'description' => 'User can assign for all permission'
          ]
        ],
      ]
    ]
  ]
];