<x-layout>
    <x-alert-success />
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
                        <a href="#" onclick="setDeleteRoute({{ $contact->id }})">
                            Excluir
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}

    <div class="modal fade"
        id="modal-deletar-contact-"
        tabindex="-1"
        aria-labelledby="modal-deletar-contact-Label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"
                        id="modal-deletar-contact-Label">{{ __('Modal de confirmação') }}</h1>
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="delete-form-contact" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    {{ __('Tem certeza que deseja deletar este Contact?') }}
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Fechar') }}</button>
                    <button type="submit"
                        form="delete-form-contact"
                        class="btn btn-primary">{{ __('Deletar') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setDeleteRoute(id) {
            const url = '{{ route('contacts.destroy', ':id') }}'.replace(':id', id);
            const deleteForm = document.getElementById('delete-form-contact');
            deleteForm.action = url;
            var modalDeletarContact = new bootstrap.Modal(document.getElementById("modal-deletar-contact-"), {});
            modalDeletarContact.show()
        }
    </script>

</x-layout>
