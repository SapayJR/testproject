@extends('layouts.admin')
@section('title', 'Лиды')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('leads.create') }}" class="btn btn-primary">Добавить лид</a>
            <form class="ml-auto d-flex" method="GET">
                <input type="text" name="search" class="form-control" placeholder="Поиск..." value="{{ request('search') }}">
                <select name="status" class="form-control mx-2">
                    <option value="">Все статусы</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                </select>
                <button class="btn btn-info">Фильтр</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr><th>Имя</th><th>Телефон</th><th>Статус</th><th>Действия</th></tr>
                </thead>
                <tbody>
                @foreach($leads as $lead)
                    <tr>
                        <td>{{ $lead->full_name }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td><div class="badge badge-info">{{ $lead->status }}</div></td>
                        <td>
                            <a href="{{ route('leads.show', $lead) }}" class="btn btn-secondary btn-sm">Детали</a>
                            <a href="{{ route('leads.edit', $lead) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Удалить?')">X</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $leads->links() }}
        </div>
    </div>
@endsection
