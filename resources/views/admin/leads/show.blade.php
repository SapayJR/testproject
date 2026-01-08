@extends('layouts.admin')
@section('title', 'Детали лида')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Информация</h4></div>
                <div class="card-body">
                    <p><strong>Имя:</strong> {{ $lead->full_name }}</p>
                    <p><strong>Телефон:</strong> {{ $lead->phone }}</p>
                    <p><strong>Заметка:</strong> {{ $lead->note }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Задачи</h4></div>
                <div class="card-body">
                    <form action="{{ route('tasks.store', $lead) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="title" class="form-control" placeholder="Новая задача..." required>
                            <div class="input-group-append"><button class="btn btn-primary">+</button></div>
                        </div>
                    </form>
                    <ul class="list-group">
                        @foreach($lead->tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span style="{{ $task->is_done ? 'text-decoration: line-through' : '' }}">
                            {{ $task->title }}
                        </span>
                                <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm {{ $task->is_done ? 'btn-success' : 'btn-light' }}">
                                        {{ $task->is_done ? 'Done' : 'Check' }}
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
