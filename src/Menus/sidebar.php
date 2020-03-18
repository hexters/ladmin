<?php

return [
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
        /**
         * Example for declaration route
         * ['administrator.access.role.show', ['uuid-uuid-uuid', 'foo' => 'bar']] --> https://domain.com/administrator/access/role/uuid-uuid-uuid?foo=bar
         */
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