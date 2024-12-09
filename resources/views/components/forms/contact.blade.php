@props(['disabled' => false, 'contact'])
<div class="">
    <div class="mb-3">
        <label for="name"
            class="form-label">Name</label>
        <input type="text"
            class="form-control"
            id="name"
            name="name"
            value="{{ old('name', $contact->name) }}"
            @if($disabled) disabled @endif>
    </div>
    <div class="mb-3">
        <label for="name"
            class="form-label">Contact</label>
        <input type="text"
            class="form-control"
            id="contact"
            name="contact"
            value="{{ old('contact', $contact->contact) }}"
            @if($disabled) disabled @endif>
    </div>
    <div class="mb-3">
        <label for="name"
            class="form-label">E-mail</label>
        <input type="email"
            class="form-control"
            id="email"
            name="email"
            value="{{ old('email', $contact->email) }}"
            @if($disabled) disabled @endif>
    </div>
</div>
