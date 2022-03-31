<div class="row d-flex align-items-center">
    <label for="name" class="form-label col-lg-3">Role Name <span class="text-danger">*</span></label>
    <x-ladmin-input id="name" type="text" class="mb-3 col" required name="name"
        value="{{ old('name', $role->name) }}" placeholder="Role Name" />
</div>