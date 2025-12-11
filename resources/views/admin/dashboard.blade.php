@extends('layouts.admin')

@section('content')

    <div class="page-header-container">
        <h2 class="page-header-title">Visão Geral</h2>
    </div>

    <div class="admin-table-wrapper">
        <div class="admin-table-header">
            <h3>Últimos Pacotes Cadastrados</h3>
            <a href="{{ route('admin.packages.create') }}" class="button button--primary">+ Novo Pacote</a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome do pacote</th>
                    <th>País/Continente</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)
                <tr>
                    <td>
                        <a href="#" class="admin-table-link">{{ $package->title }}</a>
                    </td>
                    <td>{{ $package->country->name ?? 'N/A' }}</td>
                    <td>R$ {{ number_format($package->price, 2, ',', '.') }}</td>
                    <td class="admin-table-actions">
                    <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn-action btn-action--edit" title="Editar">
                    <span class="material-icons">edit</span>
                    </a>

    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este pacote?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-action btn-action--delete" title="Excluir" style="cursor: pointer;">
            <span class="material-icons">delete</span>
        </button>
    </form>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="admin-table-wrapper">
        <div class="admin-table-header">
            <h3>Continentes</h3>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Países Cadastrados</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($continents as $continent)
                <tr>
                    <td>{{ $continent->name }}</td>
                    <td>{{ $continent->countries_count }} países</td>
                    <td class="admin-table-actions">
                        <button class="btn-action btn-action--edit">
                            <span class="material-icons">edit</span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="admin-table-wrapper">
        <div class="admin-table-header">
            <h3>Últimos Usuários</h3>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Data Cadastro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection