<x-layout>
    <form action="{{ route('contacts.store') }}" method="POST" id="contact-create">
        @csrf
        <x-forms.contact :contact="$contact" />
        <div class="d-flex justify-content-between">
            <a href="{{ route('contacts.index') }}" class="btn btn-primary">{{ __('Voltar') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
        </div>
    </form>
</x-layout>
