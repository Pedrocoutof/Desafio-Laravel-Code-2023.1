@extends('layouts.master')
@section('content')

@component('admin.components.tablePaginate')

@slot('title', 'Usuários')

@slot('head')
    <th class="text-center" width="15%">Nome</th>
    <th class="text-center" width="15%">E-mail</th>
    <th class="text-center" width="15%">Data de Nascimento</th>
    <th class="text-center" width="10%">Endereço</th>
    <th class="text-center" width="10%">Telefone</th>
    <th class="text-center" width="10%">Horário de Entrada</th>
    <th class="text-center" width="10%">Horário de Saída</th>
@endslot

@slot('body')
    @foreach ($users as $user)
    <tr>
        <td class="text-center" >{{ $user->name }}</td>
        <td class="text-center">{{ $user->email }}</td>
        <td class="text-center">{{ $user->birth_date }}</td>
        <td class="text-center">{{ $user->address }}</td>
        <td class="text-center">{{ $user->phone_number }}</td>
        <td class="text-center">{{ $user->enter_hour }}</td>
        <td class="text-center">{{ $user->leave_hour }}</td>
        <td class="options text-center">
            
            <a href="{{ route('users.edit', $user->id) }}" title="Editar Usuário" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg></a>  

            <a href="{{ route('users.show', $user->id) }}" title="Visualizar Usuário" class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg></a>
            <form class="form-delete" action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')

                <button type="submit" title="Excluir Usuário" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                </svg></button>
            </form>
        </td>
    </tr>
    @endforeach
@endslot

@endcomponent

@endsection

@push('scripts')
<script src="{{ asset('js/components/dataTable.js') }}"></script>
<script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush