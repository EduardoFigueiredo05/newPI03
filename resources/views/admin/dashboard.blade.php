@extends('layouts.admin')

@section('content')

    <div class="page-header-container">
        <h2 class="page-header-title">Visão Geral</h2>
    </div>

    @if(session('success'))
        <div style="background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background-color: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fecaca;">
            {{ session('error') }}
        </div>
    @endif


    <div class="admin-table-wrapper">
        <div class="admin-table-header">
            <h3>Últimos Pacotes</h3>
            <a href="{{ route('admin.packages.create') }}" class="button button--primary" style="font-size: 0.85rem; padding: 8px 16px;">
                + Novo Pacote
            </a>
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
                        <span style="font-weight: 600; color: #334155;">{{ $package->title }}</span>
                    </td>
                    <td>{{ $package->country->name ?? 'N/A' }}</td>
                    <td>R$ {{ number_format($package->price, 2, ',', '.') }}</td>
                    <td class="admin-table-actions">
                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn-action btn-action--edit" title="Editar">
                            <span class="material-icons">edit</span>
                        </a>

                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este pacote?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-action--delete" title="Excluir">
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
            <a href="{{ route('admin.continents.create') }}" class="button button--primary" style="font-size: 0.85rem; padding: 8px 16px;">
                + Novo Continente
            </a>
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
                    <td>
                        <span class="badge" style="background: #e0f2fe; color: #0369a1;">
                            {{ $continent->countries_count }} países
                        </span>
                    </td>
                    <td class="admin-table-actions">
                        <a href="{{ route('admin.continents.edit', $continent->id) }}" class="btn-action btn-action--edit" title="Editar">
                            <span class="material-icons">edit</span>
                        </a>

                        <form action="{{ route('admin.continents.destroy', $continent->id) }}" method="POST" onsubmit="return confirm('Tem certeza? Isso pode afetar países vinculados.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-action--delete" title="Excluir">
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
                        <span class="badge" style="
                            background: {{ $user->role === 'admin' ? '#e0e7ff' : '#f1f5f9' }};
                            color: {{ $user->role === 'admin' ? '#3730a3' : '#64748b' }};">
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