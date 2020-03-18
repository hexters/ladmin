<div class="form-group">
  @if($label)
    <label for="{{ $name }}">{{ $label }}</label>
  @endif
  <div class="input-group mb-3 border rounded">
    @if(isset($prepend))
      <div class="input-group-prepend">
          <span class="input-group-text bg-white border-0">
            {{ $prepend }}
          </span>
      </div>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{!! $value !!}" class="form-control border-0 @error($name) is-invalid @enderror">
    @if(isset($append))
      <div class="input-group-append">
          <span class="input-group-text bg-white border-0">
            {{ $append }}
          </span>
      </div>
    @endif
  </div>
  @error($name)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>
