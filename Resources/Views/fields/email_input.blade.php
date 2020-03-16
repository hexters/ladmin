<div class="form-group">
  <div class="input-group mb-3">
    @if($addon)
      <div class="input-group-prepend">
        <span class="input-group-text bg-white border-right-0">
          {!! $addon !!}
        </span>
      </div>
    @endif
    <input type="email" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $addon ? 'border-left-0' : null }}" {{ $attr }}>
  </div>
</div>