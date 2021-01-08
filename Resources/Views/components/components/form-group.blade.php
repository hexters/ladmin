<div class="form-group {{ $type == 'horizontal' ? 'row' : '' }} ladmin-form-group">
    <label for="{{ $name }}" class="{{ $type == 'horizontal' ? 'col-md-' . $colLabel . ' col-form-label' : '' }} font-weight-bold">
        {{ $label }}
        @if ($help)
            <button type="button" class="btn btn-sm btn-link" data-toggle="tooltip" data-placement="top" title="{{ $help }}">
                <i class="far fa-question-circle"></i>
            </button>
        @endif
    </label>
    <div class="{{ $type == 'horizontal' ? 'col-md-' . $colInput : '' }}">
        
        <div class="input-group border rounded">
            @if (isset($prepend))
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white border-0">{!! $prepend !!}</span>
                </div>    
            @endif
            
            {{ $slot }}
            
            @if (isset($append))
                <div class="input-group-append ">
                    <span class="input-group-text bg-white border-0">{!! $append !!}</span>
                </div>
            @endif
            
            @if (isset($custom_btn))
                <div class="input-group-append ">
                    {!! $custom_btn !!}
                </div>
            @endif
        </div>

        @if (isset($caption))
            <div>
                {!! $caption !!}
            </div>
        @endif

        @error($name)
            <div class="text-danger font-weight-bold">
                * {{ $message }}
            </div>
        @enderror
        
    </div>
</div>