@props(['id' => '', 'size' => 'md'])

<div {{ $attributes->merge(['class' => 'modal fade', 'id' => $id]) }} tabindex="-1"
    aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-{{ $size }}">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="{{ $id }}">
                    {{ $title ?? 'Modal Title' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $body ?? null }}
            </div>
            @if (isset($footer))
                <div class="modal-footer border-top-0">
                    {{ $footer ?? null }}
                </div>
            @endif
        </div>
    </div>
</div>
