@extends('ladmin::layouts.app')
@section('title', 'Assign Permission')
@section('content')
    
  <x-ladmin-card>
    <form action="{{ route('administrator.access.permission.update', $role->id) }}" method="post">
      @csrf 
      @method('PUT')
      @php
          $permissions = $role->gates;
          $viewMenu = function($menus) use (&$viewMenu, $permissions) {
              $html = '';
              foreach($menus as $menu) {
                $html .= view('vendor.ladmin.permission._partials._menus', [
                  'menu' => $menu,
                  'permissions' => $permissions,
                  'viewMenu' => $viewMenu
                ]);
              }
              return $html;
          }
      @endphp

      <ul class="list-permissions">
        {!! $viewMenu($menu->sidebar) !!}
      </ul>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Save Permission</button>
      </div>
    </form>
  </x-ladmin-card>

@endsection