<x-layout>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Contact') }}</th>
                <th scope="col">{{ __('E-mail') }}</th>
                <th scope="col">{{ __('Opções') }} </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}">{{ __('Visualizar') }}</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}">{{ __('Editar') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</x-layout>
