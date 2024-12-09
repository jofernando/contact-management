<x-layout>
    <x-alert-success />
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" id="contact-update">
        @method('PUT')
        @csrf
        <x-forms.contact :contact="$contact" />
        <div class="d-flex justify-content-between">
            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-primary">{{ __('Voltar') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
        </div>
    </form>
</x-layout>
