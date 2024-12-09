<x-layout>
    <x-alert-success />
    <x-forms.contact :disabled="true" :contact="$contact" />
    <div class="d-flex justify-content-between">
        <a href="{{ route('contacts.index') }}" class="btn btn-primary">{{ __('Voltar') }}</a>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">{{ __('Editar') }}</a>
    </div>
</x-layout>
