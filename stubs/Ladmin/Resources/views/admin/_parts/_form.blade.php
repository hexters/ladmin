<div class="row d-flex align-items-center">
    <label for="name" class="form-label col-lg-3">Full Name <span class="text-danger">*</span></label>
    <x-ladmin-input id="name" type="text" class="mb-3 col" required name="name"
        value="{{ old('name', $admin->name) }}" placeholder="Full Name" />
</div>

<div class="row d-flex align-items-center">
    <label for="email" class="form-label col-lg-3">E-mail Address <span class="text-danger">*</span></label>
    <x-ladmin-input id="email" type="email" :readonly="$admin->id === auth()->id()" class="mb-3 col" required name="email"
        value="{{ old('email', $admin->email) }}" placeholder="E-mail Address" />
</div>

<div class="row d-flex align-items-center">
    <label for="password" class="form-label col-lg-3">
        Password
        @if (!$admin->id)
            <span class="text-danger">*</span>
        @endif
    </label>
    <x-ladmin-input id="password" type="password" :required="!$admin->id" class="mb-3 col" name="password"
        placeholder="Password" />
</div>

<div class="row d-flex align-items-center">
    <label for="password_confirmation" class="form-label col-lg-3">
        Password Confirmation
        @if (!$admin->id)
            <span class="text-danger">*</span>
        @endif
    </label>
    <x-ladmin-input id="password_confirmation" :required="!$admin->id" type="password" class="mb-3 col"
        name="password_confirmation" placeholder="Password Confirmation" />
</div>
