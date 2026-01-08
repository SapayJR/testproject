@extends('layouts.admin')

@section('title', 'Редактировать лид')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Редактирование: {{ $lead->full_name }}</h4>
                </div>
                <form action="{{ route('leads.update', $lead) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label>ФИО (обязательно)</label>
                            <input type="text" name="full_name"
                                   class="form-control @error('full_name') is-invalid @enderror"
                                   value="{{ old('full_name', $lead->full_name) }}" required>
                            @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Телефон (обязательно)</label>
                            <input type="text" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $lead->phone) }}" required>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Статус</label>
                            <select name="status" class="form-control">
                                <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>New</option>
                                <option value="in_progress" {{ $lead->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="done" {{ $lead->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Заметка</label>
                            <textarea name="note" class="form-control" rows="4">{{ old('note', $lead->note) }}</textarea>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Отмена</a>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
