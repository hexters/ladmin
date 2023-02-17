<a href="" data-bs-toggle="modal" data-bs-target="#modal-ladmin-group-search" class="text-decoration-none">
    <svg xmlns="http://www.w3.org/2000/svg" style="width:30px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
    <span class="ms-2">Search...</span>
</a>

@push('before-scripts')
    <div class="modal fade" id="modal-ladmin-group-search" tabindex="-100"
        aria-labelledby="modal-ladmin-group-searchLabel" aria-hidden="true">

        <a href="" class="float-end text-decoration-none m-3 text-light" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:30px;" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <x-ladmin-input autocomplete="off" name="ladmin-search"
                            data-route="{{ route('ladmin.group.search') }}" id="ladmin-group-search-input" type="search"
                            placeholder="Search..." />
                        @if (in_array(config('app.debug'), [true, 'true', 'TRUE']))
                            <small class="text-muted ps-1 mt-3">
                                * How to use this group search follow our <a
                                    href="https://github.com/hexters/ladmin/wiki/Group-Search"
                                    target="_blank">Documentation here</a>
                            </small>
                        @endif
                    </div>
                    <div class="mb-3" id="ladmin-group-search-results"></div>
                </div>
            </div>
        </div>
    </div>
@endpush
