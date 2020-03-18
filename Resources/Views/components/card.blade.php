<div {{ $attributes->merge(['class' => 'card border-0 shadow-sm rounded-lg ' . $class]) }}>
  @if(isset($header))
    <div class="card-header">
      {{ $header }}
    </div>
  @endif
  <div class="card-body">
    @if($title)
      <h4 class="card-title">{{ $title }}</h4>
    @endif
    {{ $slot }}
  </div>
  @if(isset($footer))
    <div class="card-footer">
      {{ $footer }}
    </div>
  @endif
</div>