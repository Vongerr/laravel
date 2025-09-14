@extends('layouts.app')

@section('title', 'Создать Пункт')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Создать новый пункт</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('finance.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Название банка</label>
                    <input type="text" class="form-control @error('bank') is-invalid @enderror"
                           id="bank" name="bank" value="{{ old('bank') }}" required>
                    @error('bank')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Дата</label>
                    <textarea class="form-control @error('date') is-invalid @enderror"
                              id="date" name="date" rows="3" required>{{ old('date') }}</textarea>
                    @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="money" class="form-label">Деньги</label>
                        <input type="number" step="0.01" class="form-control @error('money') is-invalid @enderror"
                               id="money" name="money" value="{{ old('money') }}" required>
                        @error('money')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label">Категория</label>
                        <input type="number" class="form-control @error('category') is-invalid @enderror"
                               id="category" name="category" value="{{ old('category') }}" required>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Создать пункт</button>
                <a href="{{ route('finance.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
