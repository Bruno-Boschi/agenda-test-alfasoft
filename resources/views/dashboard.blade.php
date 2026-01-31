<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">

                    <a href="{{ route('contact.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                        + Adicionar Contato
                    </a>
                </div>

                <table class="min-w-full border border-gray-200" id="contacts-table">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Nome</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Telefone</th>
                            <th class="px-4 py-2 text-left">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr data-id="{{ $contact->id }}">
                                <td class="px-4 py-2">{{ $contact->name }}</td>
                                <td class="px-4 py-2">{{ $contact->email }}</td>
                                <td class="px-4 py-2">{{ $contact->phone ?? '-' }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('contact.edit', $contact) }}"
                                        class="text-blue-600 hover:underline">
                                        Editar
                                    </a>
                                    <button class="delete-contact text-red-600 hover:underline">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($contacts->isEmpty())
                    <p class="text-gray-500 mt-4">Nenhum contato cadastrado.</p>
                @endif

            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(function() {
            $('.delete-contact').on('click', function() {
                if (!confirm('Deseja realmente excluir este contato?')) {
                    return;
                }

                let row = $(this).closest('tr');
                let contactId = row.data('id');

                $.ajax({
                    url: `/contact/${contactId}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        row.fadeOut(300, function() {
                            $(this).remove();
                        });
                    },
                    error: function() {
                        alert('Erro ao excluir o contato.');
                    }
                });
            });
        });
    </script>
</x-app-layout>
