<?php 
  
  return [
    [
      'gate' => 'administrator.profile.index',
      'name' => 'Profile',
      'route' => ['administrator.profile.index', []],
      'gates' => [
        [
          'gate' => 'administrator.profile.update',
          'title' => 'Update Profile',
          'description' => 'User can update profile'
        ]
      ],
    ]
  ];