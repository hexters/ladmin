<?php

return [
  [
    'gate' => 'administrator.account',
    'name' => 'Account',
    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'route' => null,
    'isActive' => 'account/*',
    'icon' => 'fas fa-user-circle',
    'id' => '',
    'gates' => [],
    'submenus' => [
      
      [
        'gate' => 'administrator.account.admin.index',
        'name' => 'User Admin',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        /**
         * Declaration route Example
         * ['administrator.account.admin.show', ['uuid-uuid-uuid', 'foo' => 'bar']] --> https://domain.com/administrator/account/admin/uuid-uuid-uuid?foo=bar
         */
        'route' => ['administrator.account.admin.index', []],
        'isActive' => 'account/admin*',
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
          ],
          [
            'gate' => 'administrator.account.admin.destroy',
            'title' => 'Delete account',
            'description' => 'User can delete account'
          ]
        ],
      ]

    ]
  ],
  [
    'gate' => 'administrator.access',
    'name' => 'Access',
    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'route' => null,
    'isActive' => 'access/*',
    'icon' => 'fas fa-lock',
    'id' => '',
    'gates' => [],
    'submenus' => [

      [
        'gate' => 'administrator.access.role.index',
        'name' => 'Role',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.access.role.index', []],
        'isActive' => 'access/role*',
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
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.access.permission.index', []],
        'isActive' => 'access/permission*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.access.permission.show',
            'title' => 'Views detail Permission',
            'description' => 'User can view detail for all permission'
          ],
          [
            'gate' => 'administrator.access.permission.assign',
            'title' => 'Assign Permission',
            'description' => 'User can assign for all permission'
          ],
          
        ],
      ]
    ]
  ],
  [
    'gate' => 'administrator.system',
    'name' => 'System',
    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'route' => null,
    'isActive' => 'access/system*',
    'icon' => 'fas fa-cogs',
    'id' => '',
    'gates' => [],
    'submenus' => [
      [
        'gate' => 'administrator.system.log.index',
        'name' => 'System Log',
        'description' => 'Display for Ladmin error log',
        'route' => ['administrator.access.log.index', []],
        'isActive' => 'access/system/log*',
        'id' => '',
        'gates' => []
      ]
    ]
  ]
];