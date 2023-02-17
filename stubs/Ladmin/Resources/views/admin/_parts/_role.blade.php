@php
$exists = $admin
    ->roles()
    ->pluck('id')
    ->toArray();
@endphp

<div class="row d-flex mb-3 align-items-top">
    <label for="roles" class="form-label col-lg-3">Admin Roles <span class="text-danger">*</span></label>
    <div class="col">
        <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror" multiple>
            @foreach (Ladmin\Engine\Models\LadminRole::all() as $role)
                <option {{ in_array($role->id, $exists) ? 'selected' : '' }} value="{{ $role->id }}">
                    {{ $role->name }}</option>
            @endforeach
        </select>
        @error('roles')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
