@extends('layouts.admin')
@section('title', 'Новый лид')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <form action="{{ route('leads.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" required>
                        </div>
                        <div class="form-group">
                            <label>Телефон</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Статус</label>
                            <select name="status" class="form-control">
                                <option value="new">New</option>
                                <option value="in_progress">In Progress</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Заметка</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
