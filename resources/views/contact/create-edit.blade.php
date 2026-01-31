<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($contact)
                {{ isset($viewOnly) ? 'Visualizar Contato' : 'Editar Contato' }}
            @else
                Novo Contato
            @endisset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                <form method="POST"
                    action="{{ isset($contact) ? route('contact.update', $contact) : route('contact.store') }}">
                    @csrf

                    @isset($contact)
                        @method('PUT')
                    @endisset

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Nome</label>
                        <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}"
                            class="mt-1 block w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}"
                            class="mt-1 block w-full border rounded p-2" required>
                    </div>


                    <div class="mb-4">
                        <label class="block text-sm font-medium">Telefone</label>
                        <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}"
                            class="mt-1 block w-full border rounded p-2">
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 rounded">
                            Voltar
                        </a>

                        @if (!isset($viewOnly))
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                                {{ isset($contact) ? 'Atualizar' : 'Salvar' }}
                            </button>
                        @endif
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
