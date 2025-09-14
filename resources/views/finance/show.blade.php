@extends('layouts.app')

@section('title', $finance->name)

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Инфорамция о пункте: {{ $finance->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Базовая информация</h4>
                    <p><strong>ID:</strong> {{ $finance->id }}</p>
                    <p><strong>Банк:</strong> {{ $finance->bank }}</p>
                    <p><strong>Стоимость:</strong> ${{ number_format($finance->money, 2) }}</p>
                    <p><strong>Категория:</strong> {{ $finance->category }}</p>
                    <p><strong>Дата:</strong> {{ $finance->date->format('d.m.Y H:i') }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('finance.edit', $finance->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('finance.destroy', $finance->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this finance?')">Delete</button>
                </form>
                <a href="{{ route('finance.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
