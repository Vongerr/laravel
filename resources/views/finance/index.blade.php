@extends('layouts.app')

@section('title', 'Finance List')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Финансы</h2>
            <a href="{{ route('finance.create') }}" class="btn btn-primary">Создание пункта</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Банк</th>
                <th>Дата</th>
                <th>Деньги</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->bank }}</td>
                <td>${{ number_format($model->date, 2) }}</td>
                <td>{{ $model->money }}</td>
                <td>
                    <a href="{{ route('finance.show', $model->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('finance.edit', $model->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('finance.destroy', $model->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Вы действительно хотите удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $models->links() }}
    </div>
</div>
@endsection
