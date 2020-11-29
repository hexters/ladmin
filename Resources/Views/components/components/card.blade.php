<div {{ $attributes->merge(['class' => 'card border-0 shadow-sm rounded-lg ' . $class]) }}>
  @if(isset($header))
    <div class="card-header">
      {{ $header }}
    </div>
  @endif

  @if ($image)
    <img src="{{ $image }}" class="card-img-top" alt="{{ $title }}">
  @endif

  @if(empty($flat))
  <div class="card-body">
    @if($title)
      <h4 class="card-title">{{ $title }}</h4>
    @endif
    {{ $slot }}
  </div>
  @endif

  @if(isset($flat))
  <div>
    {{ $flat }}
  </div>
  @endif
  @if(isset($footer))
    <div class="card-footer">
      {{ $footer }}
    </div>
  @endif
</div>