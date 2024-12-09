@props(['disabled' => false, 'contact', 'errors' => []])
<div class="">
    <div class="mb-3">
        <label for="name"
            class="form-label">Name</label>
        <input type="text"
            class="form-control @if ($errors->has('name')) is-invalid @endif"
            id="name"
            name="name"
            value="{{ old('name', $contact->name) }}"
            @if($disabled) disabled @endif>
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label for="name"
            class="form-label">Contact</label>
        <input type="text"
            class="form-control @if ($errors->has('contact')) is-invalid @endif"
            id="contact"
            name="contact"
            value="{{ old('contact', $contact->contact) }}"
            @if($disabled) disabled @endif>
        @if ($errors->has('contact'))
            <div class="invalid-feedback">
                {{ $errors->first('contact') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label for="name"
            class="form-label">E-mail</label>
        <input type="email"
            class="form-control @if ($errors->has('email')) is-invalid @endif"
            id="email"
            name="email"
            value="{{ old('email', $contact->email) }}"
            @if($disabled) disabled @endif>
        @error('email')
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
</div>
