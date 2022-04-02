@php
$uniq = uniqid();
@endphp

<li
    class="{{ ($gate['type'] ?? 'menu') === 'divider' ? 'border-top bg-light border-bottom' : '' }} {{ isset($gate['gates']) && count($gate['gates']) > 0 ? 'has-permission' : null }} {{ isset($gate['submenus']) && count($gate['submenus']) > 0 ? 'has-sub' : '' }}">
    <div class="d-flex justify-content-between align-items-center py-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                {{ in_array($gate['gate'], $role->gates ?? []) ? 'checked' : '' }} value="{{ $gate['gate'] }}"
                name="gates[]" id="{{ $gate['gate'] }}">
            <label class="form-check-label" for="{{ $gate['gate'] }}">
                <h6 class="m-0">
                    {{ (is_null($gate['name']) || empty($gate['name'])) && ($gate['type'] ?? 'menu') === 'divider' ? 'Divider Line' : $gate['name'] }}</h6>
            </label>
            <div>
                @if (($gate['type'] ?? 'menu') === 'menu')
                    <small class="text-muted">{{ $gate['description'] }}</small>
                @else
                    @if (is_null($gate['name']) || empty($gate['name']))
                        <small class="text-muted">Menu divider will appear as a line</small>
                    @else
                        <small class="text-muted">Menu divider will appear with name {{ $gate['name'] }}</small>
                    @endif
                @endif
            </div>
        </div>
        @if (isset($gate['gates']) && count($gate['gates']) > 0 && ($gate['type'] ?? 'menu') === 'menu')
            <div>
                <x-ladmin-button size="sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#permission-{{ $uniq }}">Show Permissions</x-ladmin-button>
            </div>
        @endif
    </div>


    @if (isset($gate['gates']) && count($gate['gates']) > 0 && ($gate['type'] ?? 'menu') === 'menu')
        <div class="collapse" id="permission-{{ $uniq }}">
            <h6 class="text-primary">Permissions</h6>
            <ul class="bg-dark text-light rounded">
                @foreach ($gate['gates'] as $item)
                    <li class="py-3 form-check ladmin-permission-tile">
                        <input class="form-check-input" type="checkbox"
                            {{ in_array($item['gate'], $role->gates ?? []) ? 'checked' : '' }}
                            value="{{ $item['gate'] }}" name="gates[]" id="{{ $item['gate'] }}">
                        <label class="form-check-label" for="{{ $item['gate'] }}">
                            <h6 class="m-0">{{ $item['title'] }}</h6>
                        </label>
                        <div>
                            <small class="text-muted">{{ $item['description'] }}</small>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($gate['submenus']) && count($gate['submenus']) > 0)
        <ul class="pb-3">
            {!! $viewMenu($gate['submenus'], $level + 1) !!}
        </ul>
    @endif
</li>
