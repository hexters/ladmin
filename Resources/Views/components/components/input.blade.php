<div {{ $attributes->merge(['class' => 'form-group ' . $class]) }}>
  @if($label)
    <label class="font-weight-bold" for="{{ $name }}">{{ $label }}</label>
  @endif
  <div class="input-group border rounded @error($name) is-invalid @enderror">
    @if(isset($prepend))
      <div class="input-group-prepend">
          <span class="input-group-text bg-white border-0">
            {{ $prepend }}
          </span>
      </div>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" value="{!! $old ? old($name, $value) : $value !!}" {{  $required ? 'required' : null }} class="form-control border-0">
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
